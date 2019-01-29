<?php

try{
    $dbh = new PDO("mysql:host=localhost;dbname=library","root","");
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $ex){
    echo $ex->getMessage();
}

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

// echo "<pre>";
// print_r($errors);

if($no_error === true){
    $sql = "INSERT INTO `user` (`name`,`contact`,`address`,`email`,`password`,`user_type`) VALUES ('$fullname','$contact','$address','$email','$password','$type')";
    $message[] =  "Insert Success full";
    try{        
    $stm =  $dbh->prepare($sql);
    $stm->execute();
    }catch(PDOException $ex){
        echo $ex->getMessage();
    }
} 

$message_string ="";

foreach($message as $msg)
{
    $message_string .= $msg."<br/>";
}

header("location: register.php?message=".$message_string);