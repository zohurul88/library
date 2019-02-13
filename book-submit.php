<?php

require 'app/database.php';
require 'app/function.php';

// $book_name = $_POST['name'];
// $description = $_POST['description'];
// $picture = $_POST['picture'];
// $author_id = $_POST['author_id'];
// $category_id = $_POST['category_id'];
// $quantity = $_POST['quantity'];
// $edition = $_POST['edition'];
// $sbn = $_POST['sbn'];



// [2,3,5,7] intersect [2,5,7,4] = [2,5,7]

// $data = array_flip([
//     'name',
//     'author_id',
//     'description',
//     'picture',
//     'category_id',
//     'quantity', 
//     'edition',
//     'sbn'
// ]); 
// $data2 = array_intersect_key($_POST,$data); 


 

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

// foreach($fields as $field_name=>$field_config){
//     if($field_config['required']===true){
//         if(!isset($data[$field_name])){
//             $message[] =  $field_config['error_message'];
//             $no_error = false;
//         }
//         else if(empty($data2[$key])){
//             $message[] =  $field_config['error_message'];
//             $no_error = false;
//         }
//     }
// }


foreach($fields as $field_name=>$field_config){
    // var_dump($field_config['required']===true && (!isset($data[$field_name]) || empty($data[$field_name])));
    if($field_config['required']===true && (!isset($data[$field_name]) || empty($data[$field_name]))){
            $message[] =  $field_config['error_message'];
            $no_error = false;
        }
}


// echo "<pre>";
// echo '$_POST',"<br/>";
// print_r($_POST);
// echo "<pre>";
// echo '$data2',"<br/>";
// print_r($data2);
// // echo 'array_keys $data',"<br/>";
// // print_r(array_flip(array_keys($data)));
// // echo '$data',"<br/>";
// // print_r(array_flip($data));

// die;
 


// if(empty($book_name)){
//     $message[] = "Book name required";
//     $no_error = false;
// } 
// if(empty($author_id)){
//     $message[] = "author name required";
//     $no_error = false;
// } 
// if(empty($category_id)){
//     $message[] = "category name required";
//     $no_error = false;
// } 
// if(empty($quantity)){
//     $message[] = "quentity name required";
//     $no_error = false;
// } 
// if(empty($edition)){
//     $message[] = "Edition name required";
//     $no_error = false;
// } 
// if(empty($sbn)){
//     $message[] = "Sbn name required";
//     $no_error = false;
// } 
 
if($no_error === true){
    $table_name = "book";
    // $data = [
    //     'name'=>$book_name,
    //     'author_id'=>$author_id, 
    //     'category_id'=>$category_id, 
    //     'quantity'=>$quantity, 
    //     'edition'=>$edition, 
    //     'sbn'=>$sbn
    // ]; 
 

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