<?php
class _tests extends _migration{

public function up(){
Db::get()->query('drop table test');
}

}