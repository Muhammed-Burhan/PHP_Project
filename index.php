<?php 

require 'functions.php';

//require 'router.php';

//connect to our Mysql database.

$dsn="mysql:host=localhost;port=3306;dbname=myapp;user=root;charset=utf8mb4";

$pdo=new PDO($dsn);


    $statement=$pdo->prepare("SELECT * FROM posts;");
    $statement->execute();
    //we say fetch data as associative array
    $posts=$statement->fetchAll(PDO::FETCH_ASSOC);
;
    

    

    foreach ($posts as $key=>$post) {
        echo "<li>{$post['title']}</li>";
    }

?>