<?php
require 'bootstrap.php';

$no_error = true;
$message = [];
$config = $all_configs[$_GET['request_for']];

$fields =$config['fields'];
// echo "<pre>";
// var_dump(array_keys($fields));
// echo "</pre>";
// die();
$data = array_intersect_key($_POST,array_flip(array_keys($fields))); 


foreach($fields as $field_name=>$field_config){
    if($field_config['required']===true && (!isset($data[$field_name]) || empty($data[$field_name]))){
            $message[] =  $field_config['error_message'];
            $no_error = false;
        }
}

 
if($no_error === true){
    $table_name = "book";
    $sql = insert2($table_name, $_POST);
    $message[] =  "Insert Success full";
    try{        
    $stm =  $dbh->prepare($sql);
    $stm->execute();
    }catch(PDOException $ex){
        echo $ex->getMessage();
    }
} 
$message_string = implode('<br> ', $message);
$redirect_to = $config['redirect'];
header("location: {$redirect_to}?message=".$message_string);