<?php
//models deal with getting and inserting data
class Model{

public $db;

public function __construct(){
$this->db=Db::get();
}

}