<?php 

class Database{
    
    public $connection;

    public function __construct($config,$username='root',$password=''){
        //by default  the http_build_query is used to create quey for url
        //we will use it for creating the dsn data for us
        $dsn='mysql:'.http_build_query($config,'',';');

        $this->connection=new PDO($dsn,$username,$password,
        [
            PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC
        ]);
    }

    public function query($query){
        
        $statement=$this->connection->prepare($query);
        $statement->execute();
        //we say fetch data as associative array
        return $statement;
    }
}