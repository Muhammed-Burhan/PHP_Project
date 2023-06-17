<?php

use Core\App;
use Core\Database;
use Core\Response;
use Core\Validator;

$db=App::resolve(Database::class);



$currentUserId=1;
$errors=[];


$note=$db->query(
    "SELECT * FROM notes 
     WHERE id=:id",
     [
     'id'=> $_POST['id']
     ])->findOrFail();

authorize($note['user_id']===$currentUserId,Response::FORBIDDEN);


if(!Validator::string($_POST['body'])){
        $errors['body']='Body of the note be empty or more than 1000 character';
    }

    if(count($errors)){
            return   view('notes/edit.view.php',[
             'heading'=>'Edit note',
             'errors'=>$errors,
             'note'=>$note
            ]);
    }

   $db->query(
    "UPDATE notes SET body=:body WHERE id=:id;",
    [
       'id'=>$_POST['id'],   
       'body'=>$_POST['body'],
   ]);

   $_POST['body']='';
   header('Location:/notes');

   die();
