<?php

use Core\App;
use Core\Database;

use Core\Validator;



$db=App::resolve(Database::class);

$currentUserId=1;


$errors=[];

if(!Validator::string($_POST['body'])){
        $errors['body']='Body of the note be empty or more than 1000 character';
    }

    if(!empty($errors)){
            return   view('notes/create.view.php',[
             'heading'=>'Create a note',
             'errors'=>$errors,
            ]);
    }
    
    if(empty($errors))
    {  
        $db->query('INSERT INTO notes (body,user_id) VALUES (:body,:user_id)',[
            'body'=>$_POST['body'],
            'user_id'=>$currentUserId
        ]);
        $_POST['body']='';
    
        header('Location:/notes');
    }