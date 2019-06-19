<?php
//validate strings and other shit
class Validator{

//singleton
private static $instance;

//set to 0 if any validation fails
private $valid=1;

//the error that will be returned when calling Validator::valid()
private $error=-1;

//reset valid
public function reset(){
$this->valid=1;
$this->error=-1;
}

//returns 1 if there were no errors found, otherwise returning the error
//resets everything
public function valid(){
if($this->valid){
$this->reset();
return 1;
} else {

//we copy the error so that we can access it after it was deleted by Validator::reset()
$error=$this->error;
$this->reset();
return $error;
}
}

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

public function number($string){
if(!(filter_var($string, FILTER_VALIDATE_INT) === 0 || filter_var($string, FILTER_VALIDATE_INT))){
$this->valid=0;
return 0;
}
return 1;
}

public function positive($string){
if($string<0){
$this->valid=0;
return 0;
}
return 1;
}

private function min($string, $rule){
if($string<=(int)explode('=', $rule)[1]){
$this->valid=0;
return 0;
}
return 1;
}

private function email($string){
if(!filter_var($string, FILTER_VALIDATE_EMAIL)){
$this->valid=0;
return 0;
}
return 1;
}

private function len($string, $rule){
$s=explode('=', $rule)[1];
$s=explode(',', $s);
$minn=(int)$s[0];
$maxx=(int)$s[1];
$l=strlen($string);
if(!($minn<=$l && $l<=$maxx)){
$this->valid=0;
return 0;
}
return 1;
}

//validate a single string for a single rule
public function _validate($string, $rule, $errors, $i, $index){

//we already determined that the input is not valid
if($this->valid==0) return;

//is a whole number/integer
if($rule=='number'){
$this->number($_POST[$string]);
}

//is positive
if($rule=='positive'){
$this->positive($_POST[$string]);
}

if(strpos($rule, 'min=')!==false){
$this->min($_POST[$string], $rule);
}

if(strpos($rule, 'len=')!==false){
$this->len($_POST[$string], $rule);
}

if($rule=='email'){
$this->email($_POST[$string]);
}

//we got an error, so set that
if(!$this->valid){
$this->error=$this->parse_error($errors[$string][$i], $string);
}

}

//replace every {s}'s in the error string with the original string
private function parse_error($error, $string){
return str_replace('{s}', $string, $error);
}

//receives an array of string=>rules pairs
//validates them
public function validate($data=array(), $errors=array()){

$index=0;

foreach($data as $string=>$rules){

//explode the rules
$rules=explode('|', $rules);
$len=count($rules);

//loop through the rules and apply them
for($i=0;$i<$len && $this->valid==1;$i++){
$valid=$this->_validate($string, $rules[$i], $errors, $i, $index);
}

$index++;

}
}

//sanitize a single field, based on a single criteria
private function _sanitize($name, $rule){
if($rule=='normal'){
$_POST[$name]=filter_var($_POST[$name], FILTER_SANITIZE_STRING);
}
if($rule=='email'){
$_POST[$name]=filter_var($_POST[$name], FILTER_SANITIZE_EMAIL);
}
}

//sanitize data bazed on criterias
public function sanitize($data=array()){
foreach($data as $name=>$rules){
$rules=explode('|', $rules);
$len=count($rules);
for($i=0;$i<$len;$i++){
$this->_sanitize($name, $rules[$i]);
}
}
}

}