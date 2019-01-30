<?php

require 'app/database.php';

$author = $_POST['author'];
 
$no_error = true;
$message = [];

if(empty($author)){
    $message[] = "Author name required";
    $no_error = false;
} 
 
if($no_error === true){
    $sql = "INSERT INTO `author` (`name`) VALUES ('$author')";
    $message[] =  "Insert Success full";
    try{        
    $stm =  $dbh->prepare($sql);
    $stm->execute();
    }catch(PDOException $ex){
        echo $ex->getMessage();
    }
} 

 
$message_string = implode('<br> ', $message);
 

header("location: author.php?message=".$message_string);