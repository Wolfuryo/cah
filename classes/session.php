<?php
//class for dealing with session variables
//retrieval, modification and destruction
class Session{

//singleton
private static $instance;

private function __construct(){
self::$instance=$this;
$this->start();
}

//start the session, regenerating the id
private function start(){
session_start();
session_regenerate_id();
}

//checks if an element exists and is not empty
public function exists($name){
return isset($_SESSION[$name]) && !empty($_SESSION[$name]);
}

//get an item from the session, or null if doesn't exist
public function item($name){
if(isset($_SESSION[$name])){
return $_SESSION[$name];
}
return null;
}

//set an item to a value
public function set($name, $value){
$_SESSION[$name]=$value;
}

//erase an element
public function erase($name){
unset($_SESSION[$name]);
}

//make the class a singleton
public static function get(){
if(self::$instance===null) {
self::$instance=new self();
}
return self::$instance;
}

}