<?php
class _roomdata extends _migration{

public function up(){

Db::get()->query('alter table rooms add state INT(1) DEFAULT 0');

}

}