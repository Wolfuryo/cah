<?php
namespace Models;
class room extends \Model{

public function get($id){

return $this->db->query('select rooms.id, rooms.name, rooms.creator_id, rooms.lastactive, rooms.members, users.name as creator_name from rooms left join users on users.id=rooms.creator_id where rooms.id=?', array($id))->fetch();

}

public function update_data($room_id, $data, $active_data){
$this->db->query('update rooms set members=?, lastactive=? where id=?', array($data, $active_data, $room_id));
}


//updates user list and user timestamps
//we don't want to add users just because they are hitting the api
//
public function update($data, $users=true){
$olddata=$data['members'];
if($olddata===NULL || $olddata==='null' || $olddata==='NULL'){//probably not needed :)
$olddata=array();
} else {
$olddata=json_decode($olddata, true);
}
if($users){
if(array_search((int)\_user::get()->prop('id'), $olddata)===false){
$olddata[]=\_user::get()->prop('id');
}
}
$activedata=$data['lastactive'];
if($activedata==='null' || $activedata===NULL || $activedata==='NULL'){
$activedata=array();
} else {
$activedata=json_decode($activedata, true);
}

//add the time stamp for this user
$time=time();
$activedata[(int)\_user::get()->prop('id')]=$time;

//we remove any users that had no activity in the room for the last 30 seconds
$memlen=count($olddata);
for($i=0;$i<$memlen;$i++){
if(isset($activedata[$olddata[$i]])){

$oldtime=$activedata[$olddata[$i]];
if($time-$oldtime>=30){
unset($activedata[$olddata[$i]]);
unset($olddata[$i]);
}

}
}

$this->update_data($data['id'], json_encode(array_values($olddata)), json_encode($activedata));

return [$olddata, $activedata];

}


//returns data about the users
//receives an array of ids
//this is currently a clusterfuck :)
public function get_udata($members){
$len=count($members);
$query='select name from users where ';
for($i=0;$i<$len;$i++){
$query.='id=? OR ';
}

$query=substr($query, 0, -4);

$d=$this->db->query($query, array_values($members))->fetchAll();

$r=[];
for($i=0;$i<$len;$i++){
$r[]=$d[$i]['name'];
}
return $r;
}


}