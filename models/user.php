<?php
namespace Models;
class user extends \Model{

//verify whether a user with the given name or email already exists
public function exists($name, $email){
return $this->db->query('select id from users where name=? or email=?', array($name, $email))->fetch();
}

//get the hash
public function get_hash($id){
return $this->db->query('select hash from users where id=?', array($id))->fetch()['hash'];
}

//create an account
public function create($name, $email, $password){
$pass=new \Password();
$this->db->query('insert into users (name, email, hash) values (?, ?, ?)', array($name, $email, $pass->hash($password)));
}

public function login($id){
\Session::get()->set('id', $id);
}

}