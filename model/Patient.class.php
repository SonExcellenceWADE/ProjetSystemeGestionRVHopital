<?php
#######********                               *********##########
########******* Coding BY SON EXCELLENECE WADE & CHEIKH MBOW **********#########
#######*********                               *********##########
error_reporting(E_ALL);
ini_set('display_errors', 1);

class Patient{
    private $idPatient, $codePatient, $prenomPatient;
    private $nomPatient,  $datenais, $sexe, $telPatient;
  

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
 // the getters ou accessur
 public function getIdPatient(){ return $this->idPatient;}
 public function getCodePatient(){ return $this->codePatient;}
 public function getPrenomPatient(){ return $this->prenomPatient;}
 public function getNomPatient(){ return $this->nomPatient;}
 public function getDatenais(){ return $this->datenais;}
 public function getSexe(){ return $this->sexe;}
 public function getTelPatient(){ return $this->telPatient;}
 
// the setters ou mutateur
public function setIdPatient($idPatient){ $this->idPatient=$idPatient;}
public function setCodePatient($codePatient){$this->codePatient=$codePatient;}
public function setPrenomPatient($prenomPatient){$this->prenomPatient=$prenomPatient;}
public function setNomPatient($nomPatient){$this->nomPatient=$nomPatient;}
public function setDatenais($datenais){$this->datenais=$datenais;}
public function setSexe($sexe){$this->sexe=$sexe;}
public function setTelPatient($telPatient){$this->telPatient=$telPatient;}

}