<?php

use Core\App;
use Core\Database;

use Core\Response;

$heading="Notes {$_GET['id']}";


$db=App::resolve(Database::class);

$currentUserId=1;

$note=$db->query(
    "SELECT * FROM notes 
     WHERE id=:id",
     [
     'id'=> $_GET['id']
     ])->findOrFail();
     
  authorize($note['user_id']===$currentUserId,Response::FORBIDDEN);

view('notes/show.view.php',[
   'heading'=>$heading,
   'note'=>$note 
]);

