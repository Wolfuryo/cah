<?php
class _roomlastactive extends _migration{

public function up(){
Db::get()->query('alter table rooms add lastactive VARCHAR(1000)');
}

}