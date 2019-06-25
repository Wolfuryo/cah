<?php
//class that deals with routing a request to a controller
class Router{

//the url segments, and how many segments are there
private $parts;
private $len;

public function __construct($parts){
$this->parts=$parts;
$this->prepare();
}

//remove the empty parts and apply rawurldecode
private function prepare(){
array_shift($this->parts);
$this->len=count($this->parts);
if($this->parts[$this->len-1]===''){
array_pop($this->parts);
$this->len--;
}
for($i=0;$i<$this->len;$i++){
$this->parts[$i]=rawurldecode($this->parts[$i]);
}
}

//load the file containing the class for the given controller
private function load($name){
$file=ROOT.'/controllers/'.$name.'.php';
if(file_exists($file)){
require_once($file);
} else {
return -1;
}
}

//404 error
private function error(){
$this->load('errors');
$controller=new errors();
$controller->default();
}

//returns an array containing the arguments that we would pass to the controller method
private function arguments(){
$args=array();
for($i=2;$i<$this->len;$i++){
$args[]=$this->parts[$i];
}
return $args;
}

//do the actual routing
public function route(){

//there is nothing in parts
//we call the default controller, and its default method
if($this->len===0){
$name=Config::get()->item('config', 'default_controller');
$this->load($name);
$controller=new $name;
$controller->default();
}

//we have a single segment, so we call the default method of the controller it specifies
//or the error controller, if that doesn't exist
if($this->len===1){
if($this->load($this->parts[0])===-1){
$this->error();
} else {
$controller=new $this->parts[0];
$controller->default();
}
}

//we have at least 2 segments
//we use the controller specified by the first segment, calling the method specified by the 2nd segment,
//passing everything else as arguments
//if the method doesn't exist, we call default
//if the controller doesn't exist, we call the 404 error controller
if($this->len>=2){
if($this->load($this->parts[0])===-1){
$this->error();
} else {
$controller=new $this->parts[0];
if(method_exists($controller, $this->parts[1])){
call_user_func(array($controller, $this->parts[1]), ...$this->arguments());
} else {
$controller->default();
}
}
}

}
}