<?php
namespace Models;
class adminquestions extends \Model{

public function save($catid, $name, $ans1, $ans2, $ans3){
$this->db->query('insert into questions (statement, catid) VALUES (?, ?)', array($name, $catid));
$id=$this->db->pdo()->lastInsertId();
$this->db->query('insert into answers (statement, question, correct) VALUES (?, ?, 1), (?, ?, 0), (?, ?, 0)', array(
$ans1, $id,
$ans2, $id,
$ans3, $id,
));
}

}