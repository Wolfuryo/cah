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
$viewdata['added']=1;
} else {
if($uroom!==$id && $uroom!==-1){
$viewdata['added']=2;
} else {
$viewdata['added']=3;
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

$this->view('room', $viewdata);

}

}