
<?php
#######********                               *********##########
########******* Coding BY SON EXCELLENECE WADE & CHEIKH MBOW **********#########
#######*********                               *********##########
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once '../setting.php';
require_once MODEL.'/Manager.php';
require_once MODEL.'Config.php';

//require_once '../model/Medecin.class.php';
class ManagerMedecin extends Manager{
//function d'ajout d'un nouvvel Medecin
 public function AddMed(Medecin $medecin){
        $req=self::InsertUpdate("INSERT INTO Medecin VALUES(?, ?, ?, ?, ?, ?, ?, ? )", 
       array(
          $medecin->getIdMed(),
          $medecin->getCodeMed(), 
          $medecin->getPrenomMed(),
          $medecin->getNomMed(),
          $medecin->getEmailMed(),
          $medecin->getTelMed(),
          $medecin->getSexeMed(),
          $medecin->getIdSpecial()
        ));

        if($req){
            echo '<div class="alert alert-success">Medecin enregistré avec succés </div>';
        }else{
            echo '<div class="alert alert-danger">Erreur d\'enregistrement du nouvel Medecin </div>';
        }
    }

    //function de Mofication de Medecin
    public function editeMed(Medecin $medecin, $idMed){
        $req=self::InsertUpdate("UPDATE Medecin SET  codeMed=:codeMed, prenomMed=:prenomMed, nomMed=:nomMed, emailMed=:emailMed, telMed=:telMed, 
        sexeMed=:sexeMed, idSpecial=:idSpecial
        WHERE idMed=".$idMed,
       array( 
        ':codeMed'=>$medecin->getCodeMed(), 
        ':prenomMed'=>$medecin->getPrenomMed(),
        ':nomMed'=>$medecin->getNomMed(),
        ':emailMed'=>$medecin->getEmailMed(),
        ':telMed'=>$medecin->getTelMed(),
        ':sexeMed'=>$medecin->getSexeMed(),
        ':idSpecial'=>$medecin->getIdSpecial()
    ));
    if($req){
        echo '<div class="alert alert-success">Medecin modifié avec succés </div>';
    }else{
        echo '<div class="alert alert-danger">Erreur de Modification du Medecin </div>';
    }
    }

    //function de Suppresion d'un Medecin
    public function deleteMed($idMed){
        $req=self::delete("DELETE FROM Medecin WHERE idMed=".$idMed);
         return $req;
    }
    //function de liste de tabeau des Medecins
    public function ListeMed(){
        $req=self::FindAll("SELECT idMed, codeMed, prenomMed, nomMed, emailMed, telMed, sexeMed, nomSpecial
        FROM Medecin, Specialite
        WHERE Medecin.idSpecial=Specialite.idSpecial");
        return $req;
    }

    //function de recuperation de l'id du Medecin a modifier
    public function RecupId($idMed){
        $req=self::FindId("SELECT * FROM Medecin
        WHERE idMed=".$idMed);
        return $req;
      }
//function d'auto increment code du Medecin
    public function CodeMed(){
       $req=self::AutoCode("SELECT COUNT(*) FROM Medecin");
        return $req;
    }

    //function de Recherche Par code du Medecin
    public function RechercheMed(Medecin $medecin){
        $req= self::Search("SELECT idMed, codeMed, prenomMed, nomMed, emailMed, telMed, sexeMed, nomSpecial
        FROM Medecin, Specialite
        WHERE Medecin.idSpecial=Specialite.idSpecial AND  codeMed=:codeMed",
        array(':codeMed'=>$medecin->getCodeMed()));
        return $req;
    }
}


