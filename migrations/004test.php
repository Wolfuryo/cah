<?php
class _test extends _migration{

public function up(){
Db::get()->query('create table test(
hash VARCHAR(1000) NOT NULL
)');
}

}