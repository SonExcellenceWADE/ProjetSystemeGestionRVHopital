<?php
#######********                               *********##########
########******* Coding BY SON EXCELLENECE WADE **********#########
#######*********                               *********##########
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once '../setting.php';
require_once MODEL.'/Manager.php';
require_once MODEL.'/Config.php';


class ManagerPatient extends Manager{
//function d'ajout d'un nouvvel Patient
 public function AddPat(Patient $patient)
 {
        $req=self::InsertUpdate("INSERT INTO Patient SET  codePatient=:codePatient, prenomPatient=:prenomPatient,
        nomPatient=:nomPatient, datenais=:datenais, sexe=:sexe, telPatient=:telPatient", 
       array(
        ':codePatient'=>$patient->getCodePatient(),
        ':prenomPatient'=>$patient->getPrenomPatient(),
        ':nomPatient'=>$patient->getNomPatient(),
       ':datenais'=>$patient->getDatenais(),
        ':sexe'=>$patient->getSexe(),
        ':telPatient'=>$patient->getTelPatient()
        ));

        if($req){
            echo '<div class="alert alert-success">Patient enregistré avec succés </div>';
        }else{
            echo '<div class="alert alert-danger">Erreur d\'enregistrement du nouvel Patient </div>';
        }
    }
    //function de modification d'un Patient
    public function UpdatePat(Patient $patient, $idPatient){
        $req=self::InsertUpdate("UPDATE Patient SET  codePatient=:codePatient, prenomPatient=:prenomPatient,
        nomPatient=:nomPatient, datenais=:datenais, sexe=:sexe, telPatient=:telPatient
         WHERE idPatient=".$idPatient, 
       array(
        ':codePatient'=>$patient->getCodePatient(),
        ':prenomPatient'=>$patient->getPrenomPatient(),
        ':nomPatient'=>$patient->getNomPatient(),
       ':datenais'=>$patient->getDatenais(),
        ':sexe'=>$patient->getSexe(),
        ':telPatient'=>$patient->getTelPatient()
       
        ));

        if($req){
        //header("Location:/view/ListePatient.php");
        echo '<div class="alert alert-success">Patient modifie avec succés </div>';
           
        }else{
        echo '<div class="alert alert-danger">Erreur de modification du nouvel Patient </div>';
        }
    }
    
   /*  public function Save(Patient &$patient){
          if(is_null($patient->getIdPatient()))
          {
              return $this->AddPat($patient);
          }else{
              return $this->UpdatePat($patient, $idPatient);
          } */
    


    //function de Suppresion d'un Patient
    public function deletePatient($idPatient){
        $req=self::delete("DELETE FROM Patient WHERE idPatient=".$idPatient);
        return $req;
    }
    //function de liste de tabeau des Patients
    public function ListePat(){
        $req=self::FindAll("SELECT * FROM Patient");
        return $req;
    }
    //function de recuperation de l'id du Patient a modifier
    public function RecupId($idPatient){
      $req=self::FindId("SELECT * FROM Patient
      WHERE idPatient=".$idPatient);
      return $req;
    }
//function d'auto increment code du Patient
    public function CodePat(){
       $req=self::AutoCode("SELECT COUNT(*) FROM Patient");
        return $req;
    }

    //function de Recherche Par code du Patient
    public function RecherchePat(Patient $patient){
        $req= self::Search("SELECT * FROM Patient
        WHERE  codePatient=:codePatient",
        array(':codePatient'=>$patient->getCodePatient()));
        return $req;
    }
}


