<?php
class _chat extends _migration{

public function up(){
Db::get()->query('create table chat (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
message VARCHAR(3000) NOT NULL,
uid INT(10) NOT NULL,
roomid INT(10) NOT NULL
)');
}

}