<?php
namespace Models;
class room extends \Model{

public function get($id){

return $this->db->query('select rooms.id, rooms.name, rooms.creator_id, rooms.data, users.name as creator_name from rooms left join users on users.id=rooms.creator_id where rooms.id=?', array($id))->fetch();

}

}