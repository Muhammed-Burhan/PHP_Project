<?php 




namespace Core;


class Authenticator{

    public function attempt($array){
      
        $user=App::resolve(Database::class)->query("SELECT * FROM users Where email=:email",[
        'email'=>$array['email'],
        ])->find();

        if($user){
            if(password_verify($array['password'],$user['password'])){
                $this->login([
                     'email'=>$array['email'],
                    ]);
                return true;
            }
        }
        return false;
    }


   public function login($user){
    $_SESSION['user']=[
        'email'=>$user['email']
    ];

    session_regenerate_id(true);
    }

    public function logout(){
        Session::destroy();
    }

}