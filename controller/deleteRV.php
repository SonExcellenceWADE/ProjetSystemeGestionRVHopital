<?php
#######********                               *********##########
########******* Coding BY SON EXCELLENECE WADE **********#########
#######*********                               *********##########
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once '../setting.php';
require_once CALENDAR.'/ManagerRV.php';
require_once CALENDAR.'/RV.class.php';
$manager= new ManagerRV();

$idRV= (int) $_GET['supprimer'];

$manager->deleteRV($idRV);

header("Location:../view/ListeRV.php");