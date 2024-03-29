<?php
class _user{
//deals with deciding if a user is logged in, and returning information about them

//singleton
private static $instance;
private $id;

public $data;

//returns a property(database data)
public function prop($name){
if(!isset($this->data[$name]) || empty($this->data[$name])) return -1;
return $this->data[$name];
}

public function _logged(){
return Session::get()->exists('id');
}

public function logged(){
$this->data['logged']=Session::get()->exists('id');
return $this->data['logged'];
}

public function get_data(){
$this->id=Session::get()->item('id');
$this->data=array_merge($this->data, Db::get()->query('select * from users where id=?', array($this->id))->fetch());
}

private function __construct(){
self::$instance=$this;
if($this->logged()){
$this->get_data();
}
}

//make the class a singleton
public static function get(){
if(self::$instance===null) {
self::$instance=new self();
}
return self::$instance;
}

}