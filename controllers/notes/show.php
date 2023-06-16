<?php 

use Core\Database;

use Core\Response;

$heading="Notes {$_GET['id']}";

$config=require base_path('config.php');
$db=new Database($config['database'],'root');

$currentUserId=1;


if($_SERVER['REQUEST_METHOD']=== 'POST')

{

   $note=$db->query(
    "SELECT * FROM notes 
     WHERE id=:id",
     [
     'id'=> $_GET['id']
     ])->findOrFail();

     authorize($note['user_id']===$currentUserId,Response::FORBIDDEN);
   $db->query('DELETE from notes Where id=:id',['id'=>$_POST['id']]);
   header('Location:/notes');

}


else{

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

}