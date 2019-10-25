<?php
#######********                               *********##########
########******* Coding BY SON EXCELLENECE WADE & CHEIKH MBOW **********#########
#######*********                               *********##########
namespace Calendar;
error_reporting(E_ALL);
ini_set('display_errors', 1);

class RV{
    
    private $idRV, $numRV, $idPatient, $idPlan, $dateRV, $heureRV, $duree; 

 //function de constructeur
 public function __construct(array $data)
 {
     $this->hydrate($data);
 }

//function hydrate
public function hydrate(array $data){
 foreach ($data as $key => $value) {
    $method= 'set'.ucfirst($key);

    if(method_exists($this, $method)){
        $this->$method($value);
    }
 }

}
      //Les Getters
public function getIdRV(){return $this->idRV;}
public function getNumRV(){return $this->numRV;}
public function getIdPatient(){return $this->idPatient;}
public function getIdPlan(){return $this->idPlan;}
public function getDateRV(){return $this->dateRV;}//
public function getHeureRV(){return $this->heureRV;}
public function getDuree(){return $this->duree;}


//Les Setters
public function setIdRV($idRV){$this->idRV=$idRV;}
public function setNumRV($numRV){$this->numRV=$numRV;}
public function setIdPatient($idPatient){ $this->idPatient=$idPatient;}
public function setIdPlan($idPlan){$this->idPlan=$idPlan;}
public function setDateRV($dateRV){$this->dateRV=$dateRV;}
public function setHeureRV($heureRV){$this->heureRV=$heureRV;}
public function setDuree($duree){$this->duree=$duree;}



}