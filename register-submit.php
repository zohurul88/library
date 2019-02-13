<?php

require 'app/database.php';
require 'app/function.php';

$fullname = $_POST['fullname'];
$contact = $_POST['contact'];
$address = $_POST['address'];
$email = $_POST['email'];
$password = $_POST['password'];
$type = $_POST['type'];

$no_error = true;
$message = [];

if(empty($fullname)){
    $message[] = "Full name required";
    $no_error = false;
}
if(empty($contact) || strlen($contact) != 11){
    $message[] = "Phone Number Invalid";
    $no_error = false;
}

if(empty($address)){
    $message[] =  "Address Required";
    $no_error = false;
}
if(empty($password)){
    $message[] =  "Password Required";
    $no_error = false;
}
if(empty($type)){
    $message[] =  "Please Select a user type";
    $no_error = false;
}
 
if($no_error === true){
    $table = "user";
    $data = ['name'=>$fullname, 'contact'=>$contact, 'address'=>$address, 'email'=>$email, 'password'=>$password, 'user_type'=>$type];
    $sql = insert_user($table, $data); 
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
 

header("location: register.php?message=".$message_string);