<?php
class ApiController extends Controller{

private $inc=0;

public function ret($data){
if($this->inc===0) Output::get()->add($data);
$this->inc++;
}

}