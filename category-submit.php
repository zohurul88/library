<?php

require 'app/database.php';
require 'app/function.php';

$category = $_POST['category'];
 
$no_error = true;
$message = [];


if(empty($category)){
    $message[] = "Author name required";
    $no_error = false;
} 
 
if($no_error === true){
    $table_name = "category";
    // $query_last_portion = "(`name`) VALUES ('$category')";
 

    // $flied = ['name','status'];
 
    // $value = [$category,'active'];
 
    // $sql = insert($table_name, $flied, $value);
    
    $data = ['name'=>$category,'status'=>'active']; 
 

    $sql = insert2($table_name, $data);
    // print_r($sql);die();

    $message[] =  "Insert Success full";

    try{        
    $stm =  $dbh->prepare($sql);
    $stm->execute();
    }catch(PDOException $ex){
        echo $ex->getMessage();
    }
} 

 
$message_string = implode('<br> ', $message);
 

header("location: category.php?message=".$message_string);