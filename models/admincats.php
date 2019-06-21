<?php
namespace Models;
class admincats extends \Model{

//check whether a category with the same name already exists
public function exists($name){
return $this->db->query('select count(*) from categories where name=?', array($name))->fetch()['count(*)'];
}

//creates a category
public function create($name){
$this->db->query('insert into categories (name, color) VALUES (?, ?)', array($name, \Utils::get()->color($name)));
}

//returns all the categories
public function get(){
return $this->db->query('select id, name, color from categories')->fetchAll();
}

}