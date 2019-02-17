<?php 

$all_configs = [
    "book"=> [
        'fields'=>[
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
        ],
        'redirect'=>'book.php'
    ]
]; 