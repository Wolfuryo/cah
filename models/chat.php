<?php
namespace Models;
class chat extends \Model{

public function save($message){

$this->db->query('insert into chat (message, uid, roomid) VALUES(?, ?, ?)', array($message, \_user::get()->prop('id'), \_user::get()->prop('room')));

}


public function get($room_id){


return $this->db->query('select chat.id, chat.message, chat.uid, users.name as name from chat left join users on users.id=chat.uid where chat.roomid=?', array($room_id))->fetchAll();

}


}