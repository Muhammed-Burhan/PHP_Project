<?php

use Core\App;
use Core\Database;

use Core\Response;





$db=App::resolve(Database::class);

$currentUserId=1;



 $note=$db->query(
    "SELECT * FROM notes 
    WHERE id=:id",
    [
   'id'=> $_POST['id']
   ])->findOrFail();

authorize($note['user_id']===$currentUserId,Response::FORBIDDEN);

$db->query('DELETE from notes Where id=:id',['id'=>$_POST['id']]);

header('Location:/notes');

