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

$error=[];
$heureNot=[00, 01, 02, 03, 04, 05, 06, 07, 13, 14, 18, 19, 20, 21, 22, 23];//les horaires interdites
if(isset($_POST['planifier'])) {

   if($_POST['heureDeb']==$heureNot[0] || $_POST['heureDeb']==$heureNot[1] || $_POST['heureDeb']==$heureNot[2] 
   || $_POST['heureDeb']==$heureNot[3] || $_POST['heureDeb']==$heureNot[4] || $_POST['heureDeb']==$heureNot[4] 
   || $_POST['heureDeb']==$heureNot[5] || $_POST['heureDeb']==$heureNot[6] || $_POST['heureDeb']==$heureNot[7] 
   || $_POST['heureDeb']==$heureNot[8] || $_POST['heureDeb']==$heureNot[9] || $_POST['heureDeb']==$heureNot[10]
   || $_POST['heureDeb']==$heureNot[11]|| $_POST['heureDeb']==$heureNot[12]|| $_POST['heureDeb']==$heureNot[13] 
   || $_POST['heureDeb']==$heureNot[14] || $_POST['heureDeb']==$heureNot[15]  ){
       $error['heuredeb']="Vous ne pouvez  planifier un Rendez-Vous que 08h-12h ou 15h-17h ";
    }
    if($_POST['heureFin']==$heureNot[0] || $_POST['heureFin']==$heureNot[1] || $_POST['heureFin']==$heureNot[2] 
   || $_POST['heureFin']==$heureNot[3] || $_POST['heureFin']==$heureNot[4] || $_POST['heureFin']==$heureNot[4] 
   || $_POST['heureFin']==$heureNot[5] || $_POST['heureFin']==$heureNot[6] || $_POST['heureFin']==$heureNot[7] 
   || $_POST['heureFin']==$heureNot[8] || $_POST['heureFin']==$heureNot[9] || $_POST['heureFin']==$heureNot[10]
   || $_POST['heureFin']==$heureNot[11]|| $_POST['heureFin']==$heureNot[12]|| $_POST['heureFin']==$heureNot[13] 
   || $_POST['heureFin']==$heureNot[14] ||$_POST['heureFin']==$heureNot[15]  ){
       $error['heureFin']="Vous ne pouvez  planifier un Rendez-Vous que 08h-12h ou 15h-17h ";
    }
   
   
    if($_POST['heureDeb'] > $_POST['heureFin'] ){
      $error['debfin']="Désolé !!!l'heure de Début du Planning ne peut pas etre supérieur à l'heure de Fin Planning";
   } 
    if(count($error)>0){
       $error['vide']='';
    }else{
   
   $planing= new Planing(
array(
'heureDeb'=>trim($_POST['heureDeb'], ' '),
'heureFin'=>trim($_POST['heureFin'], ' '),
'datePlan'=>trim($_POST['datePlan'], ' '),
'idMed'=>trim($_POST['idMed'], ' ')
   ));

$manager->AddPlan($planing); //Call fucntion Add Planing
}  

 }
