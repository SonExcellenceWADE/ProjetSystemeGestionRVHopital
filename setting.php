<?php

#######********                               *********##########
########******* Coding BY SON EXCELLENECE WADE **********#########
#######*********                               *********##########
error_reporting(E_ALL);
ini_set('display_errors', 1);
$root = $_SERVER['DOCUMENT_ROOT'];
$host= $_SERVER['HTTP_HOST'];

define('HOST', 'http://'.$host.'/ProjetRV/');
define('ROOT', $root.'/ProjetRV/');
define('CONTROLLER', ROOT.'controller/');
define('VIEW', ROOT.'view/');
define('MODEL', ROOT.'model/');
define('ASSETS', HOST.'assets/');
define('CALENDAR',ROOT.'Calendar/' );
