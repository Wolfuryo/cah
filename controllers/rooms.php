<?php
class rooms extends Controller{

public function default(){
$this->view('rooms');
}

public function create(){
if(!_user::get()->_logged()) Utils::get()->redirect('/rooms');
$this->view('rooms.create');
}

}