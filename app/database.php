<?php
try{
    $dbh = new PDO("mysql:host=localhost;dbname=library","root","");
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $ex){
    echo $ex->getMessage();
} 