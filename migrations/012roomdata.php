<?php
class _roomdata extends _migration{

public function up(){
Db::get()->query('alter table rooms add data VARCHAR(1000)');
}

}