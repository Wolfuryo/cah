<?php
//helper functions
//make this a singleton for no reason :)
class UTILS{

//contains the actual output
private $output;

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

public function redirect($url){
header('Location:'.$url);die();
}

//transform a string into a color code
public function color($str){
$code=dechex(crc32($str));
$code=substr($code, 0, 6);
return $code;
}

//generates uuid string
public function uuid(){
$data=random_bytes(16);
assert(strlen($data)==16);
$data[6]=chr(ord($data[6]) & 0x0f | 0x40);// set version to 0100
$data[8]=chr(ord($data[8]) & 0x3f | 0x80);// set bits 6-7 to 10
return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}

//returns a text color based on the background
public function contrast($hexcolor){
$r=hexdec(substr($hexcolor, 1, 2));
$g=hexdec(substr($hexcolor, 3, 2));
$b=hexdec(substr($hexcolor, 5, 2));
$yiq=(($r*299)+($g*587)+($b*114))/1000;
return ($yiq>=128)?'white':'black';
}

}