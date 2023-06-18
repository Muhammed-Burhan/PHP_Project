<?php 

$_SESSION['name']='John';

view('index.view.php',[
    'heading'=>'Home Page'
]);