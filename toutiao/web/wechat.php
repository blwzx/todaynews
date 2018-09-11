<?php
$className = $_GET['c'];
include'../controller/wechat/'.$className.'.php';
$method  = $_GET['m'];
$o = new $className();
$o->$method();