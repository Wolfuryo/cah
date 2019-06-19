<?php
class _userlevels extends _migration{

public function up(){
Db::get()->query('alter table users add level INT(10) default 0');
Db::get()->query('update users set level=1 where id=1');
}

public function down(){
Db::get()->query('alter table users drop column level');
}

}