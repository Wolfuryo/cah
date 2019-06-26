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

//add the text color to every category
$cats=$model->get();
$len=count($cats);
for($i=0;$i<$len;$i++){
$cats[$i]['textcolor']=Utils::get()->contrast($cats[$i]['color']);
}

$data=array_merge($data, array('cats'=>$cats));
$this->view('admin/admin.categories', $data);
}


public function cat($name=-1, $delete=0){
if($name==-1){
Utils::get()->redirect('/admin/categories');
}

$model=$this->model('admincat');
$d=$model->exists($name);
if($d){
if($delete!==0){
$model->delete($name);
Utils::get()->redirect('/admin/categories');
}

$data=array('post'=>0, 'cat'=>$name, 'color'=>$d['color']);
if(Request::get()->is_post()){
$form=Form::get();
$data['post']=1;
if(!$form->verify()){
Utils::get()->redirect('/errors/csrf');
}

$data=array_merge($data, array('form'=>$form->fields()));
if($form->are_set('name', 'ans1', 'ans2', 'ans3')){
Validator::get()->sanitize(array(
'name'=>'normal',
'ans1'=>'normal',
'ans2'=>'normal',
'ans3'=>'normal',
));
Validator::get()->validate(array(
'name'=>'len=5,10',
'ans1'=>'len=5,10',
'ans2'=>'len=5,10',
'ans3'=>'len=5,10',
), array(
'name'=>array('The name has to have between 5 and 100 characters'),
'ans1'=>array('The answers(1) has to have between 5 and 100 characters'),
'ans2'=>array('The answers(2) has to have between 5 and 100 characters'),
'ans3'=>array('The answers(3) has to have between 5 and 100 characters'),
),);
$valid=Validator::get()->valid();
if($valid!=1){
$error=$valid;
} else {

$model=$this->model('adminquestions');
$model->save($form->field('name'), $form->field('ans1'), $form->field('ans2'), $form->field('ans3'));

}
} else {
$error='All fields are required';
}

}
$this->view('admin/admin.cat', $data);

} else {
Utils::get()->redirect('/admin/categories');
}

}

}