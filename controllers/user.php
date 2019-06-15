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