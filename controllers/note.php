<?php 

require 'Response.php';

$heading="Notes {$_GET['id']}";

$config=require('config.php');


$db=new Database($config['database'],'root');
$currentUserId=1;
$note=$db->query(
    "SELECT * FROM notes authorization
     WHERE id=:id",
     [
     'id'=> $_GET['id']
     ])->findOrFail();

    
    
     
     $statusCode=403;

     authorize($note['user_id']===$currentUserId,Response::FORBIDDEN);
   


require 'views/note.view.php';

