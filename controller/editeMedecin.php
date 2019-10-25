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
    if (is_numeric($_POST['prenomMed'])) {
        $error['pnom']="Veuilllez remplir correctement ce champ SVP...";
    }
    if(is_numeric($_POST['nomMed'])){
        $error['nom']="Veuilllez remplir correctement ce champ SVP...";
    }
if(!is_numeric($_POST['telMed'])){
    $error['tel']="Veuilllez remplir correctement ce champ SVP...";
}
if ($_POST['telMed'][0]!='7' || ($_POST['telMed'][1]!='0' && $_POST['telMed'][1]!='6' && $_POST['telMed'][1]!='7' && $_POST['telMed'][1]!='8')) {
    # code...
    $error['optel']="Votre numero de telephone doit etre commencé par 70 ou 76 ou 77 ou 78";
    }

    //Controle de saisie sur le champ de saisie Email
if (!preg_match('#^[a-zA-Z0-9]+[\w.-]*@[a-z0-9._-]{2,}\.[a-z]{2,4}$#', htmlspecialchars($_POST['emailMed'])) )
{
   # code...
   $error['email']=" Votre email est incorrect ou n'est pas valide <br/>";

}
  if(empty($_POST['emailMed'])){
   $error['mail']=" Veuillez remplir ce champ vide <br/>";
      
  }

    if(count($error)>0){
        $error['vide']="";
    }else{
   $medecin= new Medecin(array(
       'codeMed'=> trim($_POST['codeMed'], ' '),
       'prenomMed'=>trim($_POST['prenomMed'], ' '),
       'nomMed'=>trim($_POST['nomMed'], ' '),
       'emailMed'=>trim($_POST['emailMed'], ' '),
       'telMed'=>trim($_POST['telMed'], ' '),
       'sexeMed'=>trim($_POST['sexeMed'], ' '),
       'idSpecial'=>trim($_POST['idSpecial'], ' ')
   ));
   
      $manager->editeMed($medecin, $idMed); //appel du function de modificaton du Medecin
    

 }
}



