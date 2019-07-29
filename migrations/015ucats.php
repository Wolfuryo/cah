<?php
class _ucats extends _migration{

public function up(){

Db::get()->query('alter table users add ucats VARCHAR(10) DEFAULT NULL');

}

}