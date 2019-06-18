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
Db::get()->query('
insert into users (name, hash, email) VALUES ("Justice", "$2y$10$S7fNr47kYiMgUAgrK3Vs6OISkQOKEWZfdgsMhN.FCX25MB0YRtKcq", "claudiu_tirisi898@yahoo.ro")
');
}

public function down(){
Db::get()->query('drop table users');
}

}