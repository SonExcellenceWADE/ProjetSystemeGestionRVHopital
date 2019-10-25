
<?php
#######********                               *********##########
########******* Coding BY SON EXCELLENECE WADE & CHEIKH MBOW**********#########
#######*********                               *********##########
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once '../model/ManagerPatient.php';
require_once '../model/Patient.class.php';
$error=[];
$manager= new ManagerPatient();
if(isset($_POST['ajouter'])) {
    if (is_numeric($_POST['prenomPatient'])) {
        $error['pnom']="Veuilllez remplir correctement ce champ SVP...";
    }
    if(is_numeric($_POST['nomPatient'])){
        $error['nom']="Veuilllez remplir correctement ce champ SVP...";
    }
if(!is_numeric($_POST['telPatient'])){
    $error['tel']="Veuilllez remplir correctement ce champ SVP...";
}
if ($_POST['telPatient'][0]!='7' || ($_POST['telPatient'][1]!='0' && $_POST['telPatient'][1]!='6' && $_POST['telPatient'][1]!='7' && $_POST['telPatient'][1]!='8')) {
    # code...
    $error['optel']="Votre numero de telephone doit etre commencé par 70 ou 76 ou 77 ou 78";
    }


    if(count($error)>0){
        $error['vide']="";
    }else{
    $patient= new Patient(array(
'codePatient'=> trim($_POST['codePatient'],' '),       
'prenomPatient'=> trim($_POST['prenomPatient'],' '),
'nomPatient'=> trim($_POST['nomPatient'],' '),
'datenais'=> trim($_POST['datenais'], ' '),
'sexe' => trim($_POST['sexe'], ' '),
'telPatient'=> trim($_POST['telPatient'], ' '),

    ));

      $manager->AddPat($patient);
    
//appel du function d'ajout de nouvel Medecin
 }
}

?>