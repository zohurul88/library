<?php

require 'app/database.php';
require 'app/function.php';

$book_name = $_POST['book_name'];
$description = $_POST['description'];
$photo = $_POST['photo'];
$author_id = $_POST['author_id'];
$category_id = $_POST['category_id'];
$quantity = $_POST['quantity'];
$edition = $_POST['edition'];
$sbn = $_POST['sbn'];

$no_error = true;
$message = [];

if(empty($book_name)){
    $message[] = "Full name required";
    $no_error = false;
}
if(empty($description)){
    $message[] = "Description required";
    $no_error = false;
}
if(empty($photo)){
    $message[] = "Photo required";
    $no_error = false;
}
if(empty($quantity)){
    $message[] = "Quantity required";
    $no_error = false;
}
if(empty($edition)){
    $message[] = "Edition required";
    $no_error = false;
}


 
if($no_error === true){
    $table_name = "book";
    

    $data = ['name'=>$book_name,'description'=>$description,'picture'=>$photo,'author_id'=>$author_id,'category_id'=>$category_id,'quantity'=>$quantity,'edition'=>$edition,'sbn'=>$sbn];

     // data insert 2 query
    $sql = insertBook($table_name, $data);
    
    $message[] =  "Insert Success full";
    try{        
    $stm =  $dbh->prepare($sql);
    $stm->execute();
    }catch(PDOException $ex){
        echo $ex->getMessage();
    }
} 

 
$message_string = implode('<br> ', $message);
 

header("location: book.php?message=".$message_string);