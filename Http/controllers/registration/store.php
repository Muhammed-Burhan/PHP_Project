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

    if(!Validator::string($password,7,255)){
        $errors['password']='Password must be at least 7 character';
    }

    if(!empty($errors)){
        return view('registration/create.view.php',[
                'errors'=>$errors
            ]);
    }

    $db=App::resolve(Database::class);


    $user=$db->query("SELECT * FROM users Where email=:email",[
        'email'=>$email
    ])->find();

    if($user){
        header('Location:/');
        exit();
    }
    else{
        $db->query("INSERT INTO users (email,password) VALUES (:email,:password)",[
        'email'=>$email,
        'password'=>password_hash($password,PASSWORD_BCRYPT)
             ]);
             
      
             
       login([
            'email'=>$email,
         
       ]);

        header('Location:/');

        exit();
    }
