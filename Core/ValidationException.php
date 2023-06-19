<?php 

namespace Core;

class ValidationException extends \Exception{

    // when we say readonly it mean when we assigned a value to it, it cannot be changed
    public readonly array $errors;
    public readonly array $old;
    public static function throw($errors,$old){
        $instance=new static;
        $instance->errors=$errors;
        $instance->old=$old;
        throw $instance;
    }
}