<?php 


use Core\Authenticator;
use Core\Session;
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
    
//   
    Session::flash('errors',$form->getErrors());
    Session::flash('old',[
        'email'=>$attributes['email']
    ]);
    return redirect('/login');

