<?php
class _categories extends _migration{

public function up(){
Db::get()->query('create table categories (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL
)');
}

}