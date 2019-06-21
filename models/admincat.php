<?php
namespace Models;
class admincat extends \Model{

//returns false is the category name doesn't exist, or category information otherwise
//to do:I think I have another function that does the exact same thing. Should refactor
public function exists($name){
return $this->db->query('select id, color from categories where name=?', array($name))->fetch();
}

}