<?php
#######********                               *********##########
########******* Coding BY SON EXCELLENECE WADE & CHEIKH MBOW **********#########
#######*********                               *********##########
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once '../setting.php';
require_once MODEL.'/ManagerMedecin.php';
require_once MODEL.'/Medecin.class.php';
$manager = new ManagerMedecin();

// recuperation des donnees du  Medecin par son Id
$idMed = (int) $_GET['editer'];

$modif = $manager->RecupId($idMed);

//Modification du Medecin Recupere

$error=[];
if(isset($_POST['modifier'])) {
    if (is_numeric($_POST['login'])) {
        $error['login']="Veuilllez remplir correctement ce champ SVP...";
    }
    if(is_object($_POST['motpasse'])){
        $error['motpasse']="Veuilllez remplir correctement ce champ SVP...";
    }

    if(count($error)>0){
        $error['vide']="";
    }else{
   $user= new User(
array(
'login'=>trim($_POST['login'], ' '),
'motpasse'=>trim($_POST['motpasse'], ' '),
'role'=>trim($_POST['role'], ' '),
'idService'=>trim($_POST['idService'], ' ')
   ));

$manager->AddUser($user); //Call fucntion Add User
 }
}



