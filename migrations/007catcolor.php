<?php
//add the color field to categories
class _catcolor extends _migration{

public function up(){
Db::get()->query('alter table categories add color VARCHAR(10) default "2f2f2f"');
}

}