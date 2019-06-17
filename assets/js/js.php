<?php
//returns the javascript code that is needed
//include the config class

header('Content-Type: application/javascript');

use Patchwork\JSqueeze;

define('ROOT', explode('/assets/js', __DIR__)[0]);

require_once(ROOT.'/classes/config.php');
require_once(ROOT.'/assets/js/minifier.php');


function load($name){
$file=ROOT.'/assets/js/'.$name.'.js';
if(file_exists($file)){
return file_get_contents($file);
}
return '';
}


function minify($data){
$mf=new JSqueeze();
return $mf->squeeze($data, true, false);
}



$config=Config::get();

if(isset($_GET['c']) && isset($_GET['m'])){
$controller=$_GET['c'];
$method=$_GET['m'];


if($config->exists('js', $controller.'|'.$method)){
$files=$config->item('js', $controller.'|'.$method);
} else {

if($config->exists('js', $controller)){
$files=$config->item('js', $controller);
} else {
$files=$config->item('js', 'default');
}

}
} else {

if(isset($_GET['c'])){

$controller=$_GET['c'];

if($config->exists('js', $controller)){
$files=$config->item('js', $controller);
} else {
$files=$config->item('js', 'default');
}

} else {

$files=$config->item('js', 'default');

}
}

$files=explode(',', $files);
$len=count($files);
$data='';

for($i=0;$i<$len;$i++){
$data.=load($files[$i]);
}

$data=minify($data);

echo $data;