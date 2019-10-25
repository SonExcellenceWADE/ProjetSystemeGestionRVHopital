<?php
#######********                               *********##########
########******* Coding BY SON EXCELLENECE WADE **********#########
#######*********                               *********##########
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once '../setting.php';
require_once MODEL.'/ManagerPlaning.php';
require_once MODEL.'/Planing.class.php';
$manager = new ManagerPlaning();

$idPlan= (int) $_GET['supprimer'];
$manager->deletePlan($idPlan);