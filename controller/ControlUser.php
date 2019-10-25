<?php
#######********                               *********##########
########******* Coding BY SON EXCELLENECE WADE & CHEIKH MBOW**********#########
#######*********                               *********##########
error_reporting(E_ALL);
ini_set('display_errors', 1);
//require_once './setting.php';
//require_once MODEL.'/Manager.php';

try {
    $host ="localhost";
    $dbname ="gestionRV";
    $user = "son excellence";
    $mdp = 1993;

    $dsn="mysql:host=$host;dbname=$dbname";
    $pdo= new PDO($dsn, $user, $mdp, array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
      // echo "Connexion etablie";
} catch (PDOException $ex) {
    die('Erreur:'.$ex->getMessage());
}




if (isset($_POST['connecter'])) {

 session_start();
 $login=$_POST['login'];
 $motpasse=$_POST['motpasse'];
 $_SESSION['log']=$login;
    $req= $pdo->query("SELECT * FROM User
    WHERE login='$login' AND motpasse='$motpasse'");
    if($req->rowCount()!=0){
        echo "<script language='javascript' type='text/javascript'>
        location.href='home.php' </script>";
    }else{
        echo "<script type='text/javascript'>
        alert('Login ou Mot de Passe incorrect!') </script>";
    }

   
}