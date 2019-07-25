<?php
class api extends ApiController{

public function get($id=0){

if(!_user::get()->_logged()){
$this->ret(json_encode(array('state'=>false)));
}

$v=Validator::get();
if(!($v->number($id) && $v->positive($id))){
$this->ret(json_encode(array('state'=>false)));
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

//we already updated the data
//we should do the updates on the data we already have so there would be no need for this many db requests
$data=$model->get($id);
$users=$model->get_users($id);

$this->ret(json_encode(array($data, $users)));
}


public function chat(){

$form=Form::get();

if(!$form->are_set('message')){
$this->ret(json_encode(array(0)));
} else {

Validator::get()->_sanitize('message', 'normal');

$model=$this->model('chat');
$model->save($form->field('message'));

}

}



}