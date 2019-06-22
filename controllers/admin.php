<?php
_admin::get()->verify();
class admin extends Controller{

public function default(){

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

public function categories(){

$error='';
$data=array();
$model=$this->model('admincats');

if(Request::get()->is_post()){
$form=Form::get();
if(!$form->verify()){
Utils::get()->redirect('/errors/csrf');
}
$data=array_merge($data, array('form'=>$form->fields()));

Validator::get()->sanitize(array(
'name'=>'normal'
));

if($form->are_set('name')){
Validator::get()->validate(
array(
'name'=>'len=5,40'
),
array(
'name'=>array('The category name has to have between 5 and 40 characters'))
);
$valid=Validator::get()->valid();
if($valid!=1){
$error=$valid;
} else {

if($model->exists($form->field('name'))){
$error='A category with the same name already exists';
} else {
$model->create($form->field('name'));
}

}
} else {
$error='The field is compulsory';
}

}

if($error){
$data=array_merge($data, array('error'=>$error));
}

$cats=$model->get();
$data=array_merge($data, array('cats'=>$cats));
$this->view('admin/admin.categories', $data);
}


public function cat($name=-1){
if($name==-1){
Utils::get()->redirect('/admin/categories');
}

Validator::get()->set(array('name'=>$name));
Validator::get()->sanitize(array('name'=>'normal'));
$model=$this->model('admincat');
$data=$model->exists($name);

if($data){

$this->view('admin/admin.cat');

} else {
Utils::get()->redirect('/admin/categories');
}

}

}