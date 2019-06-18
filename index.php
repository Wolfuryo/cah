<?php
//file that handles every incoming request

//the base url
define('ROOT', __DIR__);

//include file containing simple functions
require_once('functions.php');
//include the autoload file which loads the needed classes
require_once('autoload.php');

//grab the request url
$url=$_SERVER['REQUEST_URI'];

//break the url in parts
$parts=explode('/', $url);

//run migrations
Migrations::get();

//initialize the user system
_user::get();

//pass the url to the router class and route it
$router=new Router($parts);
$router->route();

//render the page
Output::get()->render();