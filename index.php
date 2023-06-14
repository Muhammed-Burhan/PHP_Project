<?php 

require 'Database.php';
require 'functions.php';
//require 'router.php';

$config=require('config.php');


$db=new Database($config['database'],'root');

$posts=$db->query("SELECT * FROM posts;")->fetchAll(PDO::FETCH_ASSOC);


    foreach ($posts as $key=>$post) {
        echo "<li>{$post['title']}</li>";
    }

?>