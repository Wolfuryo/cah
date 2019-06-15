<?php
//creates the migrations table
class _migrations extends _migration{

public function up(){
Db::get()->query('
create table migrations(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL
)
');
}

public function down(){
Db::get()->query('
drop table migrations
');
}

}