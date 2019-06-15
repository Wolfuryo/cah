<?php
namespace Models;
class user extends \Model{

//verify whether a user with the given name or email already exists
public function exists($name, $email){
return $this->db->query('select count(*) from users where name=? or email=?', array($name, $email))->fetch()['count(*)'];
}

public function create($name, $email, $password){
$pass=new \Password();
$this->db->query('insert into users (name, email, hash) values (?, ?, ?)', array($name, $email, $pass->hash($password)));
}

}