<?php
//database connection and querying
//is a singleton
class Db{
//singleton
private static $instance;
//pdo instance
private $pdo;

private function __construct(){
self::$instance=$this;
$config=Config::get();
$host=$config->item('db', 'host');
$charset=$config->item('db', 'charset');
$user=$config->item('db', 'user');
$pass=$config->item('db', 'pass');
//create a connection, without mentioning the database
$dsn="mysql:host=$host;charset=$charset";
$options=array(
PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,
PDO::ATTR_EMULATE_PREPARES=>false,
);
$this->pdo=new PDO($dsn, $user, $pass, $options);
}

//return the pdo instance
public function pdo(){
return $this->pdo;
}

//checks if a table exists
public function table_exists($name){
return $this->query('select count(*)
from information_schema.tables where table_schema=? and table_name=?', array(Config::get()->item('db', 'dbname'), $name))->fetch()['count(*)'];
}

//runs a query with the given parameters
public function query($query, $data=array()){
$statement=$this->pdo->prepare($query);
$statement->execute($data);
return $statement;
}

//use the database specified in the config file
public function use(){
$this->pdo->exec('use '.Config::get()->item('db', 'dbname'));
}

//make the class a singleton
public static function get(){
if(self::$instance===null) {
self::$instance=new self();
}
return self::$instance;
}

}