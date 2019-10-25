<?php
#######********                               *********##########
########******* Coding BY SON EXCELLENECE WADE & CHEIKH MBOW **********#########
#######*********                               *********##########
error_reporting(E_ALL);
ini_set('display_errors', 1);

class Planing{
    private $idPlan,  $heureDeb,  $heureFin, $datePlan,  $idMed;

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

//les getters
public function getIdPlan(){return $this->idPlan;}
public function getHeureDeb(){return $this->heureDeb;}
public function getHeureFin(){return $this->heureFin;}
public function getDatePlan(){return $this->datePlan;}
public function getIdMed(){return $this->idMed;}

//les setters
public function setIdPlan($idPlan){$this->idPlan=$idPlan;}
public function setHeureDeb($heureDeb){$this->heureDeb=$heureDeb;}
public function setHeureFin($heureFin){$this->heureFin=$heureFin;}
public function setDatePlan($datePlan){$this->datePlan=$datePlan;}
public function setIdMed($idMed){$this->idMed=$idMed;}

}
