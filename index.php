<?php 

require 'Database.php';
require 'functions.php';
//require 'router.php';


$db=new Database();

$posts=$db->query("SELECT * FROM posts;")->fetchAll(PDO::FETCH_ASSOC);


    foreach ($posts as $key=>$post) {
        echo "<li>{$post['title']}</li>";
    }

?>