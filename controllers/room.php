<?php
class room extends Controller{

public function default($id){

$v=Validator::get();
if(!($v->number($id) && $v->positive($id))){
Utils::get()->redirect('/rooms');
}

$this->view('room');

}

}