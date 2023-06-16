<?php 

namespace Core;


use PDO;

class Database{
    
    public $connection;
    public $statement;

    
    public function __construct($config,$username='root',$password=''){
        //by default  the http_build_query is used to create quey for url
        //we will use it for creating the dsn data for us
        $dsn='mysql:'.http_build_query($config,'',';');

        $this->connection=new PDO($dsn,$username,$password,
        [
            PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC
        ]);
    }

    public function query($query,$params=[]){
        
        $this->statement=$this->connection->prepare($query);
        $this->statement->execute($params);
        //we say fetch data as associative array
        return $this;
    }

    public function get(){
        $result=$this->statement->fetchAll();

        return $result;
    }

     public function find(){
        return $this->statement->fetch();
    }

    public function findOrFail(){
        
        $result=$this->find();

        if(!$result){
            abort();
        }

        return $result;
    }
}