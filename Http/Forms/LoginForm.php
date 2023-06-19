<?php 



namespace Http\Forms;

use Core\Validator;
use Core\ValidationException;
class LoginForm{

    protected $errors=[];

    public function __construct(public array $attributes){
        if(!Validator::email($attributes['email'])){
        $this->errors['email']='Please provide valid email address';
        }

        if(!Validator::string($attributes['password'])){
        $this->errors['password']='Please provide valid password';
        }
    }

    public static function validate($attributes){

        $instance=new static($attributes);
        
        return $instance->failed() ? $instance->throw() : $instance;
    }

    public function throw(){
        ValidationException::throw($this->getErrors(),$this->attributes);
    }


    public function failed(){
        return count($this->errors);
    }
    
    public function getErrors(){
        return $this->errors;
    }

    public function error($filed,$message){
        $this->errors[$filed]=$message;
        return $this;
    }

}