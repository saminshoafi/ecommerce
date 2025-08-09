<?php

class mainDB{
    public $servername="localhost";
    public $username="root";
    public $password="";
    public $DBname="ecommerce";
    public $connection;
    public function __construct(){
        $this->connection = new mysqli($this->servername,$this->username,$this->password,$this->DBname);
    }
    public static function creatObject(){
        $className = static::class;
        return new $className();
    }
}
    

















