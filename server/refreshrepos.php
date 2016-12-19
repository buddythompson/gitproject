<?php
require_once('../vendor/autoload.php');//Load Guzzle
require_once('dbconn.php');//Require DB credentials
$db= new dbConn;
$dbh=$db->getConnection();

//Checking for a refresh less than 5 minutes ago==================================================================================
$sql='select max(refreshdate) from reporefreshlog';
$result = $dbh->prepare($sql); $result->execute();
$rowsX = $result->fetchALL(PDO::FETCH_NUM);
if (count($rowsX)>0) {
    $refreshdate=$rowsX[0][0];
    $sql="SELECT (TIME_TO_SEC(NOW()) - TIME_TO_SEC('$refreshdate'))/60 AS 'minutes'";
    $result = $dbh->prepare($sql); $result->execute();
    $rowsX = $result->fetchALL(PDO::FETCH_NUM);
   if (count($row)>0){ $minutes=$rowsX[0][0];} else {$minutes=5;}
    if ($minutes*1<5) {
        $arr=array("Success"=>'500', "message"=>"Refresh occurred less than 5 minutes ago.\nPlease allow more time before attempting a refresh.");
        echo json_encode($arr);
        return;
    }
}
//Use Guzzle to return list of repositories========================================================================================
$i=0;
$x=0;
for ($page=1; $page<4; $page++) {
    $repository_url='https://api.github.com/search/repositories?q=+language:php&sort=stars&order=desc&page='.$page.'&per_page=100';
    $myClient= new GuzzleHttp\Client(['headers' => ['User-Agent'=>'MyReader']]);
    $feed_response = $myClient->request('GET',$repository_url);
    //If data has been received, process it========================================================================================
    if ($feed_response->getStatusCode()==200) {
        if ($feed_response->hasHeader('content-length')) {
            $contentLength=$feed_response->getHeader('content-length')[0];
            $rateLimit=$feed_response->getHeader('x-ratelimit-limit')[0];
            $rateLimitRemaining=$feed_response->getHeader('x-ratelimit-limit-remaining')[0];
        }
        
        $body=json_decode($feed_response->getBody());
        //Insert or Update each Repo in DB=========================================================================================
        foreach($body->items as $item) {
            $sql="select repositoryid from repodata where repositoryid=".$item->id;
            $result = $dbh->prepare($sql); $result->execute();
            $rowsX = $result->fetchALL(PDO::FETCH_ASSOC);
            $countX=count($rowsX);
            if ($countX==0) {
                $sql="insert into repodata (repositoryid,name,url,createdate,pushdate,description,stars,insertiondate,lastmoddate)
                values ($item->id,'$item->name','$item->html_url','$item->created_at','$item->pushed_at','$item->description',
                '$item->stargazers_count',Now(),Now())";
                $result = $dbh->prepare($sql); $result->execute();    
                $i++;
            } else 
            {
                $sql="update repodata set name='$item->name', url='$item->html_url', createdate='$item->created_at', 
                pushdate='$item->pushed_at',description='$item->description',
                stars='$item->stargazers_count',lastmoddate=Now() where repositoryid=$item->id";
                $result = $dbh->prepare($sql); $result->execute();    
                $x++;
            }
        }
    }
}
        
//Log Repo Refresh Activity DB=====================================================================================================
$sql="Insert into reporefreshlog (refreshdate,refreshnotes) values (Now(),'$i repos inserted,$x repos updated')";
$result = $dbh->prepare($sql); $result->execute();  
$arr=array("Success"=>'200', "message"=>"Refresh successful");
echo json_encode($arr);
return;
        