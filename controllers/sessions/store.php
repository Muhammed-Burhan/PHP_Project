<?php 


use Core\App;
use Core\Database;

use Core\Validator;

$email=$_POST['email'];
$password=$_POST['password'];



$errors=[];

    if(!Validator::email($email)){
        $errors['email']='Please provide valid email address';
    }

    if(!Validator::string($password)){
        $errors['password']='Please provide valid password';
    }

    if(!empty($errors)){
        return view('sessions/create.view.php',[
                'errors'=>$errors
            ]);
    }

    $db=App::resolve(Database::class);

    $user=$db->query("SELECT * FROM users Where email=:email",[
        'email'=>$email,
    ])->find();

    if($user){
        if(password_verify($password,$user['password'])){
            login([
                'email'=>$email,
            ]);
        header('Location:/');
        exit();
        }
    }

    return view('sessions/create.view.php',[
                'errors'=>[
                    'email'=>'No matching account for this email and password'
                ]
            ]);
    

