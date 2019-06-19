<?php
class admin extends Controller{

public function default(){

_admin::get()->verify();
$this->view('admin/admin.index');

}

public function users($page=1){
if(!(Validator::get()->number($page) && Validator::get()->positive($page))){
$page=1;
}
_admin::get()->verify();
$model=$this->model('adminusers');
$users=$model->get($page);

$this->view('admin/admin.users', array('users'=>$users, 'amount'=>$model->number(), 'page'=>$page));
}

}