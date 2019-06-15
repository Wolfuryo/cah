<?php
//deal with request types
class Request{

//singleton
private static $instance;

//check if the request is a post one
public function is_post(){
return $_SERVER['REQUEST_METHOD']==='POST';
}

private function __construct(){
self::$instance=$this;
}

//make the class a singleton
public static function get(){
if(self::$instance===null) {
self::$instance=new self();
}
return self::$instance;
}

}