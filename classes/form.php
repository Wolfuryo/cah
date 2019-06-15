<?php
//deals with form submitting
//csrf verification
//checking if fields are set
class form{

//singleton
private static $instance;

//csrf token
private $token;

private function __construct(){
self::$instance=$this;
$this->load_csrf();
}

//returns the csrf token
public function csrf(){
return $this->token;
}

//verifies if the csrf tokens are valid
public function verify(){
if(!isset($_POST['csrf']) || empty($_POST['csrf'])) return 0;
return $_POST['csrf']===$this->token;
}

//returns an array with all the fields
public function fields(){
unset($_POST['csrf']);
return $_POST;
}

//loads the csrf token from the session
//or creates one if it doesn't exist
private function load_csrf(){
if(!Session::get()->exists('csrf')) $this->generate_csrf();
$this->token=Session::item('csrf');
}

//returns 1 if the fields specified in the argument are set in the POST array
public function are_set(...$fields){
$len=count($fields);
for($i=0;$i<$len;$i++){
if(!(isset($_POST[$fields[$i]]) && !empty($_POST[$fields[$i]]))){
return 0;
}
}
return 1;
}

//generate a 32 characters long csrf token and save it in the session
private function generate_csrf(){
$token=substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 32); 
Session::get()->set('csrf', $token);
}

//make the class a singleton
public static function get(){
if(self::$instance===null) {
self::$instance=new self();
}
return self::$instance;
}

}