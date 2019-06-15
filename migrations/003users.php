<?php
//class that deals with creating the user table
class _users extends _migration{

public function up(){
Db::get()->query('
create table users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
hash VARCHAR(1000) NOT NULL,
email VARCHAR(50) NOT NULL
)
');
}

public function down(){
Db::get()->query('drop table users');
}

}