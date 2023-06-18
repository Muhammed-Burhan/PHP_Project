<?php 


use Core\Authenticator;
use Http\Forms\LoginForm;


$attributes=[
        'email'=>$_POST['email'],
        'password'=>$_POST['password']
    ];

    $form=new LoginForm();    

    if($form->validate($attributes)){

        if((new Authenticator())->attempt($attributes)){
                redirect('/');
        }
            $form->error('email','No matching account found for this email');
    }
        return view('sessions/create.view.php',[
                    'errors'=>$form->getErrors()
                ]);    
   
    

