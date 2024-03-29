<?php
class rooms extends Controller{

public function default(){
$model=$this->model('rooms');
$rooms=$model->get();
$data=array();
$data=array_merge($data, array('rooms'=>$rooms));
$this->view('rooms', $data);
}

public function create(){
if(!_user::get()->_logged()) Utils::get()->redirect('/rooms');
if(_user::get()->prop('room')!==-1){
Utils::get()->redirect('/rooms/error');
}
$error=0;
$data=array();
$form=Form::get();
if(Request::get()->is_post()){
if(!$form->verify()) Utils::get()->redirect('/errors/csrf');
$data=array_merge($data, array('form'=>$form->fields()));

Validator::get()->sanitize(array(
'name'=>'normal',
));

if($form->are_set('name')){

Validator::get()->validate(array(
'name'=>'len=5,40',
), array(
'name'=>array('The room name has to have between 5 and 40 characters'),
));

$valid=Validator::get()->valid();
if($valid!=1){
$error=$valid;
} else {

$model=$this->model('rooms');
$id=$model->create($form->field('name'));
Utils::get()->redirect("/room/$id");

}

} else {
$error='All fields are required';
}

}

if($error){
$data=array_merge($data, array('error'=>$error));
}
$this->view('rooms.create', $data);
}



public function error(){

$model=$this->model('room');
$rid=_user::get()->prop('room');
$name=$model->get($rid)['name'];

$this->view('room.error', array('rid'=>$rid, 'rname'=>$name));

}



}