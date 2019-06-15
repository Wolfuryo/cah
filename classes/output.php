<?php
//class that collects output as it's being generated, then renders it
class Output{

//contains the actual output
private $output;

//add more output
public function add($data){
$this->output.=$data;
}

//render the data
public function render(){
echo $this->output;
}

//singleton
private static $instance;

private function __construct(){
self::$instance=$this;
}

//make the class a singleton
public static function get(){
if(self::$instance===null) {
self::$instance=new self();
}
return self::$instance;
}

}