<?php
class api extends ApiController{

public function get($id=0){
$model=$this->model('room');
$data=$model->get($id);
$this->ret(json_encode($data));
}

}