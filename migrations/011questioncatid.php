<?php
class _questioncatid extends _migration{
public function up(){

Db::get()->query('alter table questions add catid INT(10) NOT NULL');

}
}