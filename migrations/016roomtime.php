<?php
class _roomtime extends _migration{

public function up(){

Db::get()->query('alter table rooms add time INT(11) DEFAULT -1');

}

}