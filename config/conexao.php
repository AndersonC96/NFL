<?php
    $dsn   = "mysql:host=localhost;dbname=nfl";
    $user  = "root";
    $pass  = "";
    try{
        $con = new PDO($dsn, $user, $pass);
    }catch(PDOException $e){
        echo 'Connection failed: ' . $e->getMessage();
    }
?>