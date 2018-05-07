<?php

function getDBConnection() {
    
    //C9 db info
    // $host = "localhost";
    // $dbName = "csumb_quiz";
    // $username = 'Iris';
    // //echo "username: $username";
    // $password = "cst336";
     $host = "us-cdbr-iron-east-05.cleardb.net";
     $dbName = "heroku_c8b34ae9cd193df";
     $username = 'bc1d23cb79635b';
     //echo "username: $username";
     $password = "e4f61d06";
    
    
    //when connecting from Heroku
    if  (strpos($_SERVER['HTTP_HOST'], 'herokuapp') !== false) {
        $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
        $host = $url["host"];
        $dbName = substr($url["path"], 1);
        $username = $url["user"];
        $password = $url["pass"];
    } 
    
    try {
        //Creates a database connection
        $dbConn = new PDO("mysql:host=$host;dbname=$dbName", $username, $password);
    
        // Setting Errorhandling to Exception
        $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    }
    catch (PDOException $e) {
       echo "Problems connecting to database!";
       exit();
    }
    
    
    return $dbConn;
}

?>