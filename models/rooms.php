<?php
namespace Models;
class rooms extends \Model{

public function create($name){
$this->db->query('insert into rooms (name, creator_id) values(?, ?)', array($name, \_user::get()->prop('id')));
}

//returns an array of all the rooms
//will need to paginate this somehow
public function get(){
return $this->db->query('select id, name, creator_id from rooms')->fetchAll();
}

//receives an array with room data and adds the creator_name to it
public function cname(&$data=array()){
$len=count($data);
$ids=array();
for($i=0;$i<$len;$i++){
if(!in_array($data[$i]['creator_id'], $ids)){
$ids[]=$data[$i]['creator_id'];
}
}
var_dump($ids);
}

}