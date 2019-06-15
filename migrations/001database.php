<?php
//migration that creates the database
class _database extends _migration{

public function up(){
Db::get()->pdo()->exec('create database if not exists '.Config::get()->item('db', 'dbname'));
}

public function down(){
Db::get()->query('drop database ?', Config::get()->item('db', 'dbname'));
}

}