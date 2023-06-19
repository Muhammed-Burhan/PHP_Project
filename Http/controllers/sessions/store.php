<?php 


use Core\Authenticator;
use Core\Session;
use Core\ValidationException;
use Http\Forms\LoginForm;


$attributes=[
        'email'=>$_POST['email'],
        'password'=>$_POST['password']
    ];
    
    $form=LoginForm::validate($attributes);
    
    $signedIn=(new Authenticator())
                ->attempt($attributes);
    
    if(!$signedIn){
        $form->error('email','No matching account found for this email')
        ->throw();
        }
    
    redirect('/');
   

   



   

