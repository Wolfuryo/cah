<?php
class api extends ApiController{

public function get($id=0){
$model=$this->model('room');
$data=$model->get($id);
if(!$data){
$this->ret(json_encode(array('state'=>false)));
} else {
$this->ret(json_encode($data));
}
}

}