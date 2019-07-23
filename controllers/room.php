<?php
class room extends Controller{

public function default($id){

$v=Validator::get();
if(!($v->number($id) && $v->positive($id))){
Utils::get()->redirect('/rooms');
}
$model=$this->model('room');
$data=$model->get($id);

if($data===false){
Utils::get()->redirect('/rooms');
}

$olddata=$data['data'];
if($olddata==='null'){
$olddata=array('members'=>array());
} else {
$olddata=json_decode($olddata, true);
}

if(array_search((int)_user::get()->prop('id'), $olddata['members'])===false && (int)_user::get()->prop('id')!=$data['creator_id']){
$olddata['members'][]=_user::get()->prop('id');
}

$model->update_data($id, json_encode($olddata));

$this->view('room');

}

}