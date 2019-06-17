<?php
//controller class, extended by every other controller
class Controller{

//the twig instance
private $twig;

//create a twig instance
//hopefully we won't have to instantiate Controller more than once
public function __construct(){
$loader=new \Twig\Loader\FilesystemLoader('views');
$this->twig=new \Twig\Environment($loader, [
'cache'=>false,
]);
}

//load a model
public function model($name){
require_once(ROOT.'/models/'.$name.'.php');
$name='\Models\\'.$name;
return new $name;
}

//load a view using twig
public function view($name, $data=array()){
$template=$this->twig->load($name.'.php');
//add the csrf token to data
$data=array_merge($data, array('csrf'=>Form::get()->csrf(), 'controller'=>get_called_class(), 'method'=>debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS,2)[1]['function']));
$data=array_merge($data, array('user'=>_user::get()->data));
Output::get()->add($template->render($data));
}

//the default method for any controller
public function default(){
echo 'Controller::default';
}
};