<?php
class api extends ApiController{

public function get($id=0){
$model=$this->model('room');
$data=$model->get($id);

if($data===false){
$this->ret(json_encode(array('state'=>false)));
return;
}

$newdata=$model->update($data, false);
$data['members']=$newdata[0];

$names=$model->get_udata($data['members']);

$data['names']=$names;

$this->ret(json_encode($data));
}

}