<?php
class _emailverification extends _migration{

public function up(){
Db::get()->query('alter table users add everified INT(10) default 0');
Db::get()->query('alter table users add mailhash INT(100)');
}

}