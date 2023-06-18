<?php 



namespace Http\Forms;

use Core\Validator;

class LoginForm{

    protected $errors=[];
    public function validate($array){
        if(!Validator::email($array['email'])){
        $this->errors['email']='Please provide valid email address';
    }

    if(!Validator::string($array['password'])){
        $this->errors['password']='Please provide valid password';
    }

        return empty($this->errors);
    }
    
    public function getErrors(){
        return $this->errors;
    }

}