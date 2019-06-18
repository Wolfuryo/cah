<?php
//creates the rooms table
class _rooms extends _migration{

public function up(){
Db::get()->query('
create table rooms (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
creator_id VARCHAR(10) NOT NULL
)
');
}

public function down(){
Db::get()->query('drop table rooms');
}

}