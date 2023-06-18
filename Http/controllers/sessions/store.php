<?php 


use Core\App;
use Core\Database;


use Http\Forms\LoginForm;


$attributes=[
        'email'=>$_POST['email'],
        'password'=>$_POST['password']
    ];

    $form=new LoginForm();    

     if(!$form->validate($attributes)){
        return view('sessions/create.view.php',[
                'errors'=>$form->getErrors()
            ]);
        }
    

    

    $db=App::resolve(Database::class);

    $user=$db->query("SELECT * FROM users Where email=:email",[
        'email'=>$attributes['email'],
    ])->find();

    if($user){
        if(password_verify($attributes['password'],$user['password'])){
            login([
                'email'=>$attributes['email'],
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
    

