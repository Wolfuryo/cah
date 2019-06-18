<?php
namespace Models;
class room extends \Model{

public function create($name){
$this->db->query('insert into rooms (name, creator_id) values(?, ?)', array($name, \_user::get()->prop('id')));
}

}