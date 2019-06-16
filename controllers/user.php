<?php
//controller for /user
class user extends Controller{

public function default(){
}

public function login(){

$error=0;
$data=array();

if(Request::get()->is_post()){
$form=Form::get();
if(!$form->verify()){
Utils::get()->redirect('/errors/csrf');
}

$data=array_merge($data, array('form'=>$form->fields()));

Validator::get()->sanitize(array(
'name'=>'normal',
'pass'=>'normal',
));

if($form->are_set('name', 'pass')){
Validator::get()->validate(
array(
'name'=>'len=0,1000',
'pass'=>'len=10,1000',
), array(
'name'=>array(
'Usernames have between 5 and 40 characters;emails go up to 1000 characters',
),
'pass'=>array(
'Password have between 10 and 1000 characters',
),
)
);
$valid=Validator::get()->valid();
if($valid!=1){
$error=$valid;
} else {

$model=$this->model('user');
$id=$model->exists($form->field('name'), $form->field('name'));

if($id){
$hash=$model->get_hash($id['id']);

if((new Password())->verify($form->field('pass'), $hash)){

$model->login($id['id']);

} else {
$error='The password you provided is wrong';
}

} else {
$error='No user with the given username/email exists';
}

}
} else {
$error='All fields are required';
}

}

if($error){
$data=array_merge($data, array('error'=>$error));
}
$this->view('login', $data);

}

public function register(){
$error=0;
$data=array();
if(Request::get()->is_post()){

$form=Form::get();
if(!$form->verify()){
Utils::get()->redirect('/errors/csrf');
}

$data=array_merge($data, array('form'=>$form->fields()));

Validator::get()->sanitize(array(
'name'=>'normal',
'email'=>'normal|email',
));

if($form->are_set('name', 'pass', 'email')){

$data=array_merge($data, array('form'=>$form->fields()));

Validator::get()->validate(array(
'name'=>'len=5,40',
'email'=>'len=0,1000|email',
'pass'=>'len=10,1000',
), array(
'name'=>array(
'The username has to be have 5 and 40 characters',
),
'email'=>array(
'The email address has to have less than 1000 characters',
'The email address is not valid',
),
'pass'=>array(
'The password has to have between 10 and 1000 characters',
)
));

$valid=Validator::get()->valid();
if($valid!=1){
$error=$valid;
} else {

$model=$this->model('user');
if($model->exists($form->field('name'), $form->field('email'))){
$error='A user with the email and/or username you selected already exists';
} else {
$model->create($form->field('name'), $form->field('email'), $form->field('pass'));
}
}
} else {
$error='All fields are required';
}

if($error){
$data=array_merge($data, array('error'=>$error));
}

}

$this->view('register', $data);

}

public function logout(){
Session::get()->erase('id');
Utils::get()->redirect('/');
}

}