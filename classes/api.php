<?php
class ApiController extends Controller{

public function ret($data){
Output::get()->add($data);
}

}