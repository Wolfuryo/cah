<?php
namespace Models;
class adminusers extends \Model{

//returns an array of users, up to 20, starting from ($page-1)*20, to $page*20
public function get($page=1){
return $this->db->query('select * from users LIMIT ?, 20', array(($page-1)*20))->fetchAll();
}

//returns number of users
public function number(){
return $this->db->query('select count(*) from users')->fetch()['count(*)'];
}

}