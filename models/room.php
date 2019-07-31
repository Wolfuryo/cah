<?php
namespace Models;
class room extends \Model{

public function exists($id){
return $this->db->query('select count(*) from rooms where id=?', array($id))->fetch()['count(*)'];
}

public function get($id){

return $this->db->query('select rooms.id, rooms.name, rooms.creator_id, rooms.state, users.name as creator_name from rooms left join users on users.id=rooms.creator_id where rooms.id=?', array($id))->fetch();

}

public function get_users($room_id){
return $this->db->query('select id, name, room, roomactiv from users where room=?', array($room_id))->fetchAll();
}

public function get_unum($room_id){
return (int)$this->db->query('select count(*) from users where room=?', array($room_id))->fetch()['count(*)'];
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

public function do($op, $room_id, $data=array()){
if($this->exists($room_id)){
switch($op){
case 'join':return $this->join($room_id);break;
case 'start':return $this->start($room_id);break;
case 'choices':return $this->choices($room_id, $data);break;
}
return 1;
}
return 0;
}

public function join($room_id){
$this->db->query('update users set room=? where id=?', array($room_id, \_user::get()->prop('id')));
}

public function start($room_id){
if((int)$this->get($room_id)['creator_id']!==(int)\_user::get()->prop('id')) return -1; //not the master
if($this->get_unum($room_id)<2){
return 0; //not enough users
}
$this->db->query('update rooms set state=1 where id=?', array($room_id));
return 1;
}

public function choices($room_id, $data){
if(\_user::get()->prop('ucats')!==0) return 0;
$this->db->query('update users set ucats=? where id=?', array(
$data, \_user::get()->prop('id')
));
return 1;
}


}