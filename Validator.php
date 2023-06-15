<?php 


class Validator{

    // 
    /**
     * so when a function only relies on its parameters and don't
     * need internal or external package or class instance...etc
     * it's called pure, And when we have pure functions 
     * we can make them static so that we can
     * access them directly through our 
     * class without the need of 
     * creating an instance 
     * of the class 
     */
    public static function string($value,$min=1,$max=INF){
        $value=trim($value);

        return strlen($value) >= $min && strlen($value) <= $max;
    }

    public static function email($value){
    // This is an php function which check and validate things for you
        return filter_var($value,FILTER_VALIDATE_EMAIL);
    }
}