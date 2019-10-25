<?php
#######********                               *********##########
########******* Coding BY SON EXCELLENECE WADE & CHEIKH MBOW **********#########
#######*********                               *********##########

use Calendar\RV;

error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once '../setting.php';
require_once MODEL.'/Manager.php';
require_once MODEL.'/Config.php';

class ManagerRV extends Manager{

    //function d'ajout d'un RV
    public function AddRV(RV $rv){
       $req=self::InsertUpdate("INSERT INTO RV SET numRV=:numRV, idPatient=:idPatient,
      idPlan=:idPlan, dateRV=:dateRV, heureRV=:heureRV, duree=:duree", 
       array(
       ':numRV'=>$rv->getNumRV(),
       ':idPatient'=>$rv->getIdPatient(),
       ':idPlan'=>$rv->getIdPlan(),
       ':dateRV'=>$rv->getDateRV(),
       ':heureRV'=>$rv->getHeureRV(),
       ':duree'=>$rv->getDuree()
       ));
       if($req){
        echo '<div class="alert alert-success">Rendez-Vous enregistré avec succés </div>';
    }else{
        echo '<div class="alert alert-danger">Erreur d\'enregistrement du nouvel Rendez-Vous </div>';
    }
}

//function modification d'un RV
public function UpdateRV(RV $rv, $idRV){
    $req=self::InsertUpdate("UPDATE RV SET numRV=:numRV, idPatient=:idPatient,
   idPlan=:idPlan, dateRV=:dateRV, heureRV=:heureRV, duree=:duree
   WHERE idRV=".$idRV, 
    array(
    ':numRV'=>$rv->getNumRV(),
    ':idPatient'=>$rv->getIdPatient(),
    ':idPlan'=>$rv->getIdPlan(),
    ':dateRV'=>$rv->getDateRV(),
    ':heureRV'=>$rv->getHeureRV(),
    ':duree'=>$rv->getDuree()
    ));
    if($req){
     echo '<div class="alert alert-success">Rendez-Vous modifié avec succés </div>';
 }else{
     echo '<div class="alert alert-danger">Erreur de modification du  Rendez-Vous </div>';
 }
}

 //function de Suppresion d'un Planing
    public function deleteRV($idRV){
        $req=self::delete("DELETE FROM RV WHERE idRV=".$idRV);
         return $req;
    }
 //function de liste de tabeau des Planing
 public function ListeRV(){
    $req=self::FindAll("SELECT idRV, numRV, dateRV, heureRV, duree, codePatient, 
    nomPatient, prenomPatient, datePlan, codeMed, prenomMed, nomMed, nomSpecial  
    FROM RV, Patient, Planing, Medecin, Specialite
    WHERE RV.idPatient= Patient.idPatient AND RV.idPlan= Planing.idPlan AND 
    Planing.idMed= Medecin.idMed AND Medecin.idSpecial= Specialite.idSpecial ");
    return $req;
}

//function  d'auto generation du numero de Rendez-Vous
public function NumRV(){
    $req=self::AutoCode("SELECT COUNT(*) FROM RV");
    return $req;
}


     /**
     * Recuperer les evenements de Rendez-Vous
     * @return array
     */

    public function getEventsBetween(){
        

       $req=self::FindAll("SELECT idRV, numRV, dateRV, heureRV, duree, codePatient, nomPatient, prenomPatient, datePlan, codeMed, prenomMed, nomMed, nomSpecial  
       FROM RV, Patient, Planing, Medecin, Specialite
       WHERE RV.idPatient= Patient.idPatient AND RV.idPlan= Planing.idPlan AND 
       Planing.idMed= Medecin.idMed AND Medecin.idSpecial= Specialite.idSpecial");
    
       return $req;
        
    }
      /**
     * Recuperer les evenement commencant d'une date indexe par jour
     * @return array
     */
    public function getEventsBetweenByDay(\DateTime  $dateRV ) :array{
    $events= $this->getEventsBetween();
    $days=[];
    foreach ($events as  $event) {
        $date=explode(' ',$event->dateRV)[0];
        if(!isset($days[$date])){
            $days[$date]=[$event];
        }else{
            $days[$date][]=$event;
        }
    }
    return $days;
    }
    /**
     * Recuperer  un Rendez-Vous
     * @return $id
     * @return array
     */

    public function findRV(int $idRV){
      $result=self::FindId("SELECT  numRV, dateRV, heureRV, duree, codePatient, nomPatient, prenomPatient, datePlan, codeMed, prenomMed, nomMed, nomSpecial  
      FROM RV, Patient, Planing, Medecin, Specialite
      WHERE RV.idPatient= Patient.idPatient AND RV.idPlan= Planing.idPlan AND 
      Planing.idMed= Medecin.idMed AND Medecin.idSpecial= Specialite.idSpecial  AND idRV= $idRV Limit 1");
      return $result;
    }

}