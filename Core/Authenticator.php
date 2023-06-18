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
        $_SESSION=[];
        session_destroy();
    
        if(ini_get("session.use_cookies")){
            $param=session_get_cookie_params();
            setcookie('PHPSESSID','',time()-3600,$param['path'],$param['domain'],$param['secure'],$param['httponly']);
        }
    
        if (isset($_COOKIE[session_name()])) {
            unset($_COOKIE[session_name()]);
        }
    
        session_unset();
    }

}