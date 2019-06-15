<?php
//class that deals with executing migrations
class Migrations{

//singleton
private static $instance;
private $db;

//load the migrations
private function load(){
$migs=array();
$len;
foreach(glob(ROOT.'/migrations/*.php') as $file){
require_once($file);
//get the migration name, by removing the extension and the number
$file=explode('/', $file);
$len=count($file);
$file=$file[$len-1];
$file=substr(substr($file, 0, -4), 3);
$migs[]=$file;
}
return $migs;
}

//save the fact that a migration was don
private function mark($name){

Db::get()->query('insert into migrations (name) values(?)', array($name));

}

private function __construct(){
self::$instance=$this;
$this->db=Db::get();
$this->migrate();
}

//run a single migration
//if mark is set to 0, the migration won't be marked as done in the database
private function _migrate($name, $mark=1){
if($mark) $this->mark($name);
$name='_'.$name;
$mig=new $name;
$mig->up();
}

//returns an array of migrations that where already done
private function get_done(){
$st=Db::get()->query('select name from migrations');
$d=array();
while($row=$st->fetch()){
$d[]=$row['name'];
}
return $d;
}

//run the migrations
private function migrate(){
//get the list of migrations
$migs=$this->load();
//remove the first 2 migrations(database creation and migrations table creation)
array_shift($migs);
array_shift($migs);

$this->_migrate('database', false);
Db::get()->use();

//check if the migrations table exists, and create it otherwise
if(!Db::get()->table_exists('migrations')){
$this->_migrate('migrations', false);
}

$done=$this->get_done();

$todos=array_values(array_diff($migs, $done));
$len=count($todos);

for($i=0;$i<$len;$i++){
$this->_migrate($todos[$i]);
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