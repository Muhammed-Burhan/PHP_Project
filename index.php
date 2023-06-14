<?php 

require 'Database.php';
require 'functions.php';
//require 'router.php';

$config=require('config.php');


$db=new Database($config['database'],'root');

$id=$_GET['id'];
$query="SELECT * FROM 
posts where id= :id;";
$posts=$db->query($query,[":id"=>$id])->fetchAll();


    foreach ($posts as $key=>$post) {
        echo "<li>{$post['title']}</li>";
    }

?>