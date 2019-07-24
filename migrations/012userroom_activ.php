<?php
class _userroom_activ extends _migration{

public function up(){

Db::get()->query('alter table users add room INT(10) DEFAULT NULL');
Db::get()->query('alter table users add roomactiv INT(10) DEFAULT NULL');

}

}