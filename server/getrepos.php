<?php
require_once('dbconn.php');
$db= new dbConn;
$dbh=$db->getConnection();
$sql="select repositoryid, name, url, DATE_FORMAT(createdate,'%m/%d/%Y %H:%i:%s') as createdate, 
DATE_FORMAT(pushdate,'%m/%d/%Y %H:%i:%s') as pushdate, description,FORMAT(stars,0) as stars,
stars as starsX from repodata order by starsX desc";
$result = $dbh->prepare($sql); $result->execute();
$rows = $result->fetchALL(PDO::FETCH_ASSOC);
$db->closeConnection($dbh);
$datarows=json_encode($rows);
$datarows='{"data" : '.$datarows."}";
echo $datarows;