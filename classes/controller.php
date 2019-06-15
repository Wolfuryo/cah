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

public function view($name, $data=array()){
$template=$this->twig->load($name.'.php');
//add the csrf token to data
$data=array_merge($data, array('csrf'=>Form::get()->csrf()));
Output::get()->add($template->render($data));
}

//the default method for any controller
public function default(){
echo 'Controller::default';
}
};