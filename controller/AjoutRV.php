<?php
#######********                               *********##########
########******* Coding BY SON EXCELLENECE WADE **********#########
#######*********                               *********##########

use Calendar\RV;

error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once '../setting.php';
require_once CALENDAR.'/ManagerRV.php';
require_once CALENDAR.'/RV.class.php';
$manager = new ManagerRV();

$error=[];
$heureNot=[00, 01, 02, 03, 04, 05, 06, 07, 13, 14, 18, 19, 20, 21, 22, 23];//les horaires interdites
if(isset($_POST['reserver'])) {
    if($_POST['heureRV']==$heureNot[0] || $_POST['heureRV']==$heureNot[1] || $_POST['heureRV']==$heureNot[2] 
    || $_POST['heureRV']==$heureNot[3] || $_POST['heureRV']==$heureNot[4] || $_POST['heureRV']==$heureNot[4] 
    || $_POST['heureRV']==$heureNot[5] || $_POST['heureRV']==$heureNot[6] || $_POST['heureRV']==$heureNot[7] 
    || $_POST['heureRV']==$heureNot[8] || $_POST['heureRV']==$heureNot[9] || $_POST['heureRV']==$heureNot[10]
    || $_POST['heureRV']==$heureNot[11]|| $_POST['heureRV']==$heureNot[12]|| $_POST['heureRV']==$heureNot[13] 
    ||$_POST['heureRV']==$heureNot[14] ||$_POST['heureRV']==$heureNot[15]  ){
       
      $error['heureNot']="Les heures de Rendez-Vous de 08h-12h ou 15h-17h ";
   
   } 
    if(count($error)>0){
       $error['vide']='';
    }else{
   
   $rv= new RV(
      array(
         'numRV'=>trim($_POST['numRV'], ' '),
         'idPatient'=>trim($_POST['idPatient'], ' '),
         'idPlan'=>trim($_POST['idPlan'], ' '),
         'dateRV'=>trim($_POST['dateRV'], ' '),
         'heureRV'=>trim($_POST['heureRV'], ' '),
         'duree'=>trim($_POST['duree'], ' ')
   ));
  
 $manager->AddRV($rv);
}  

 }
