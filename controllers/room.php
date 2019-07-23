<?php
class room extends Controller{

public function default($id){

if(!_user::get()->_logged()) Utils::get()->redirect('/user/login');

$v=Validator::get();
if(!($v->number($id) && $v->positive($id))){
Utils::get()->redirect('/rooms');
}
$model=$this->model('room');
$data=$model->get($id);

if($data===false){
Utils::get()->redirect('/rooms');
}

$model->update($data);
$this->view('room');

}

}