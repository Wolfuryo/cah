<?php
class rooms extends Controller{

public function default(){
$this->view('rooms');
}

public function create(){
if(!_user::get()->_logged()) Utils::get()->redirect('/rooms');
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

$model=$this->model('room');
$model->create($form->field('name'));

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

}