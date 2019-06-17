<?php
//class that deals with loading config files, and providing access to the options in them
//to do:figure out if we need the ability to modify config values
//to do:only load files based on environment(development/production)
//this class is a singleton
class Config{

private static $instance=null;

//holds the configuration values
private $store=array();
 
private function __construct(){
$this->load();
}

//loads all of the configuration files
private function load(){
foreach(glob(ROOT.'/config/*php') as $file){
$name=explode('/', $file);
//the file name
$name=$name[count($name)-1];
//remove the extension
$name=substr($name, 0, -4);

$this->store[$name]=require_once($file);

}
}

//returns a configuration element in the given group
public function item($group, $name){
return $this->store[$group][$name];
}

//checks whether an item exists
//we assume that the group exists
public function exists($group, $name){
return isset($this->store[$group][$name]);
}

//return an instance
public static function get(){
if (self::$instance===null){
self::$instance=new self;
}
return self::$instance;
}

}