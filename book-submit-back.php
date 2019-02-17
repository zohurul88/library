<?php




$fields = [
    'name'=>[
        'required'=>true,
        'error_message'=>"Name is missing or empty"
    ],
    'author_id'=>[
        'required'=>true,
        'error_message'=>"Author is missing  or empty"
    ],
    'description'=>[
        'required'=>false,
        'error_message'=>"Description is missing  or empty"
    ],
    'picture'=>[
        'required'=>false,
        'error_message'=>"Picture is missing  or empty"
    ],
    'category_id'=>[
        'required'=>true,
        'error_message'=>"Category is missing  or empty"
    ],
    'quantity'=>[
        'required'=>true,
        'error_message'=>"Quantity is missing  or empty"
    ],
    'edition'=>[
        'required'=>true,
        'error_message'=>"Edition is missing  or empty"

    ],
    'sbn'=>[
        'required'=>true,
        'error_message'=>"sbn is missing  or empty"
    ]
]; 


$data = array_intersect_key($_POST,array_flip(array_keys($fields))); 

$no_error = true;
$message = [];

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
header("location: book.php?message=".$message_string);