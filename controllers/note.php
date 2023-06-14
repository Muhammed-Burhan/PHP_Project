<?php 

require 'Response.php';

$heading="Notes {$_GET['id']}";

$config=require('config.php');


$db=new Database($config['database'],'root');

$note=$db->query(
    "SELECT * FROM notes
     WHERE id=:id",
     [
   
     'id'=> $_GET['id']
     ])->fetch();

     if(!$note){
        abort(Response::NOT_FOUND);
     }
    
     $currentUserId=1;
     $statusCode=403;
    if($note['user_id']!==$currentUserId){
        abort(Response::FORBIDDEN);
    }


require 'views/note.view.php';

