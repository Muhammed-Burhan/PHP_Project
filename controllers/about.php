<?php 

$heading='Hello '.$_SESSION['name'] ?? 'about page';



view('about.view.php',[
    'heading'=>$heading
]);
