<?php
class admin extends Controller{

public function default(){

_admin::get()->verify();
$this->view('admin/admin.index');

}

public function users(){
_admin::get()->verify();
$this->view('admin/admin.users');
}

}