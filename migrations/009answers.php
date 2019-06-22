<?php
class _answers extends _migration{

public function up(){
Db::get()->query('create table answers (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
statement VARCHAR(100) NOT NULL,
question INT(6) NOT NULL,
correct INT(1) DEFAULT 0
)');
}

public function down(){
Db::get()->query('drop table answers');
}

}