<?php 

$heading = 'Welcome' . ($_SESSION['user']['email'] ?? ' to about page');




view('about.view.php',[
    'heading'=>$heading
]);
