<?php
//controller for /user
class user extends Controller{

public function default(){
}

public function login(){

$this->view('login');

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
if($form->are_set('name', 'pass', 'email')){

Validator::get()->validate(array(
'name'=>'len=5,30'
), array(
'name'=>array(
'The username has to be between 5 and 30 characters',
)));

$valid=Validator::get()->valid();
if($valid!=1){
$error=$valid;
}

} else {
$error='All fields are required';
}

}

if($error){
$data=array_merge($data, array('error'=>$error));
}

$this->view('register', $data);
}

}