<?php

class dbConn {
   function getConnection() {
        $ip = getenv("IP");
        $port = '3306';
        $user = "REDACTED";
        $db = "repos";    
        try{
            $handler = new PDO("mysql:host=$ip;port=$port;dbname=$db;charset=utf8",$user,"");
            return $handler;
        }
        catch(Exception $e){
            echo $e->getMessage();
            return 0;
        }        
    }    
    
   function closeConnection($handler) {
        $handler=null;
    }
}