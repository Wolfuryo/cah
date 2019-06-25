<?php
class _questions extends _migration{

public function up(){
Db::get()->query('create table questions (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
statement VARCHAR(100) NOT NULL
)');
}

public function down(){
Db::get()->query('drop table questions');
}

}