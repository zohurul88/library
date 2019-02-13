<?php

require 'app/database.php';
require 'app/function.php';

$author = $_POST['author'];
 
$no_error = true;
$message = [];

if(empty($author)){
    $message[] = "Author name required";
    $no_error = false;
} 
 
if($no_error === true){
    $table_name = "author";
    $table_filds = ["name"];
    $from_name = [$author];

    $query = insert_author($table_name, $table_filds, $from_name);
    $message[] =  "Author Insert Success full";
    try{        
    $stm =  $dbh->prepare($query);
    $stm->execute();
    }catch(PDOException $ex){
        echo $ex->getMessage();
    }
} 

 
$message_string = implode('<br> ', $message);
 

header("location: author.php?message=".$message_string);