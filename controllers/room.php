<?php
class room extends Controller{

public function default($id){

if(!_user::get()->_logged()) Utils::get()->redirect('/user/login');

$v=Validator::get();
if(!($v->number($id) && $v->positive($id))){
Utils::get()->redirect('/rooms');
}

$id=(int)$id;

$viewdata=array();

$model=$this->model('room');
$data=$model->get($id);
$users=$model->get_users($id);

$uroom=_user::get()->prop('room');

if($uroom===-1){
$model->add_current_user($id);
$viewdata['ustate']=1;
} else {
if($uroom!==$id && $uroom!==-1){
$viewdata['ustate']=2;
} else {
$viewdata['ustate']=3;
}
}

$len=count($users);
$time=time();
for($i=0;$i<$len;$i++){
if($time-$users[$i]['roomactiv']>=30){
$model->remove_user($id, $users[$i]['id']);
}
}

$model->update_current_user_time();

$model=$this->model('admincats');
$viewdata['cats']=$model->get();

if($data['state']===0 && (int)_user::get()->prop('id')===(int)$data['creator_id']){
$viewdata['canstart']=1;
} else {

if($data['state']===0){
$viewdata['canstart']=0;
}

}

$this->view('room', $viewdata);

}


public function error(){

$this-view('room.error');

}


}