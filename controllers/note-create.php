<?php 

require "Validator.php";

$config=require('config.php');

$db=new Database($config['database'],'root');

$currentUserId=1;


dd(Validator::email('mba@gmail.com'));

$heading="Create Note.";

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    
    $errors=[];

    if(!Validator::string($_POST['body'])){
        $errors['body']='Body of the note be empty or more than 1000 character';
    }
    
    if(empty($errors))
    {  
        $db->query('INSERT INTO notes (body,user_id) VALUES (:body,:user_id)',[
            'body'=>$_POST['body'],
            'user_id'=>$currentUserId
        ]);
        $_POST['body']='';
    }
}


require 'views/note-create.view.php';

