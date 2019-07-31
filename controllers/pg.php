<?php
class pg extends Controller{

public function default(){
$s=_user::get()->prop('id')===1;
$this->view('pg', array('show'=>$s));

}
}