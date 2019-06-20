<?php
//class that collects output as it's being generated, then renders it
class _admin{

//redirects the user if they're not an admin
public function verify(){
if(_user::get()->prop('level')!==1) Utils::get()->redirect('/');
}

//singleton
private static $instance;

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