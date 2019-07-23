<?php
namespace Models;
class rooms extends \Model{

public function create($name){
$this->db->query('insert into rooms (name, creator_id) values(?, ?)', array($name, \_user::get()->prop('id')));
$id=$this->db->pdo()->lastInsertId();
$this->update_user($id);
return $id;
}

//returns an array of all the rooms
//will need to paginate this somehow
public function get(){
return $this->db->query('select rooms.id, rooms.name, rooms.creator_id, users.name as creator_name from rooms left join users on users.id=rooms.creator_id where rooms.id IS NOT NULL')->fetchAll();
}

public function update_user($id){
$this->db->query('update users set room=?, roomactiv=? where id=?', array($id, time(), \_user::get()->prop('id')));
}


}