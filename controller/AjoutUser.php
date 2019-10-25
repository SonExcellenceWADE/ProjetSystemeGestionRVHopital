<?php
#######********                               *********##########
########******* Coding BY SON EXCELLENECE WADE **********#########
#######*********                               *********##########
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once '../setting.php';
require_once MODEL.'/ManagerUser.php';
require_once MODEL.'/User.class.php';
$manager = new ManagerUser();


$error=[];
if(isset($_POST['inscrire'])) {
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