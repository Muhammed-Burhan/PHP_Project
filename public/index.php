<?php 





const BASE_PATH=__DIR__.'/../';


require BASE_PATH.'Core/functions.php';

spl_autoload_register(function($class)
{
    $class=str_replace('\\','/',$class);
    require base_path("{$class}.php");
});

require base_path('Core/router.php');



// $id=$_GET['id'];
// $query="SELECT * FROM 
// posts where id= :id;";
// $posts=$db->query($query,[":id"=>$id])->fetchAll();


    // foreach ($posts as $key=>$post) {
    //     echo "<li>{$post['title']}</li>";
    // }

?>