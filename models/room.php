<?php
namespace Models;
class room extends \Model{

public function get($id){

return $this->db->query('select name, creator_id from rooms where id=?', array($id))->fetch();

}

public function get_users($room_id){
return $this->db->query('select id, name, room, roomactiv from users where room=?', array($room_id))->fetchAll();
}


public function add_current_user($roomid){
$this->db->query('update users set room=? where id=?', array($roomid, \_user::get()->prop('id')));
}

public function remove_user($room, $uid){
$this->db->query('update users set room=NULL where id=?', array($uid));
}

public function update_current_user_time(){
$this->db->query('update users set roomactiv=? where id=?', array(time(), \_user::get()->prop('id')));
}

}