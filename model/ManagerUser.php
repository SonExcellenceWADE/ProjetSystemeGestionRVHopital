<?php
#######********                               *********##########
########******* Coding BY SON EXCELLENECE WADE & CHEIKH MBOW **********#########
#######*********                               *********##########
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once '../setting.php';
require_once MODEL.'/Manager.php';
require_once MODEL.'/Config.php';


class ManagerUser extends Manager{
//function d'ajout d'un nouvvel User
 public function AddUser(User $user)
 {
        $req=self::InsertUpdate("INSERT INTO User SET  login=:login, motpasse=:motpasse,
        role=:role, idService=:idService", 
       array(
        ':login'=>$user->getLogin(),
        ':motpasse'=>$user->getMotpasse(),
        ':role'=>$user->getRole(),
        ':idService'=>$user->getIdService()
        ));

        if($req){
            echo '<div class="alert alert-success">Utlisateur enregistré avec succés </div>';
            header("Location:../index.php");
        }else{
            echo '<div class="alert alert-danger">Erreur d\'enregistrement du nouvel Utilisateur </div>';
        }
    }
    //function de modification d'un User
    public function UpdateUser(User $user, $idUser){
        $req=self::InsertUpdate("UPDATE User SET  login=:login, motpasse=:motpasse,
        role=:role, idService=:idService 
        WHERE idUser=".$idUser, 
       array(
        ':login'=>$user->getLogin(),
        ':motpasse'=>$user->getMotpasse(),
        ':role'=>$user->getRole(),
        ':idService'=>$user->getIdService()
        ));

        if($req){
        //header("Location:/view/ListePatient.php");
        echo '<div class="alert alert-success">Utilisateur modifie avec succés </div>';
           
        }else{
        echo '<div class="alert alert-danger">Erreur de modification de l\'utilisateur </div>';
        }
    }

    //function de recuperation de l'id User
    public function RecupId($idUser){
        $req=self::FindId("SELECT * FROM User
        WHERE idUser=".$idUser);

        return $req;
    }



}
