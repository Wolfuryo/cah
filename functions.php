<?php
//file containing simple functions
//this shouldn't get too big, but if it does, it has to be split in smaller ones

//function that loads every php file in a folder
function load_all($folder){
foreach(glob(ROOT.'/'.$folder.'/*.php') as $file){
require_once($file);
}
}