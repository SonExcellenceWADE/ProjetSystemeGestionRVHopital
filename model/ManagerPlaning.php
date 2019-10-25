<?php
#######********                               *********##########
########******* Coding BY SON EXCELLENECE WADE & CHEIKH MBOW **********#########
#######*********                               *********##########
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once '../setting.php';
require_once MODEL.'/Manager.php';
require_once MODEL.'/Config.php';

class ManagerPlaning extends Manager{

    //function d'ajout d'un planing
    public function AddPlan(Planing $planing){
       $req=self::InsertUpdate("INSERT INTO Planing SET heureDeb=:heureDeb, 
       heureFin=:heureFin, datePlan=:datePlan, idMed=:idMed", 
       array(
        ':heureDeb'=>$planing->getHeureDeb(),
        ':heureFin'=>$planing->getHeureFin(),
        ':datePlan'=>$planing->getDatePlan(),
        ':idMed'=>$planing->getIdMed()
       ));
       if($req){
        echo '<div class="alert alert-success">Planning enregistré avec succés </div>';
    }else{
        echo '<div class="alert alert-danger">Erreur d\'enregistrement du nouvel Planning </div>';
    }
}


    //function de Suppresion d'un Planing
    public function deletePlan($idPlan){
        $req=self::delete("DELETE FROM Planing WHERE idPlan=".$idPlan);
         return $req;
    } 

//function de moficiation d'un planning
public function UpdatePlan(Planing $planing, $idPlan){
    $req=self::InsertUpdate("UPDATE  Planing SET heureDeb=:heureDeb, 
    heureFin=:heureFin, datePlan=:datePlan, idMed=:idMed
    WHERE idPlan=".$idPlan , 
    array(
     ':heureDeb'=>$planing->getHeureDeb(),
     ':heureFin'=>$planing->getHeureFin(),
     ':datePlan'=>$planing->getDatePlan(),
     ':idMed'=>$planing->getIdMed()
    ));
    if($req){
     echo '<div class="alert alert-success">Planning modifié avec succés </div>';
 }else{
     echo '<div class="alert alert-danger">Erreur de modification du nouvel Planning </div>';
 }
}

//function Recuperation de l'id planning a modifier
public  function RecupId($idPlan){
    $req=self::FindId("SELECT * FROM Planing WHERE idPlan=".$idPlan);
    return $req;
}

 //function de liste de tabeau des Planing
 public function ListePlan(){
    $req=self::FindAll("SELECT idPlan, heureDeb, heureFin, datePlan, codeMed, prenomMed, nomMed
    FROM Planing, Medecin
    WHERE Planing.idMed=Medecin.idMed");
    return $req;
}


}