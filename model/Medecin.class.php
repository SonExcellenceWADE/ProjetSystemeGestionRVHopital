<?php
#######********                               *********##########
########******* Coding BY SON EXCELLENECE WADE **********#########
#######*********                               *********##########
error_reporting(E_ALL);
ini_set('display_errors', 1);

class Medecin{
    private $idMed, $codeMed, $prenomMed;
    private $nomMed, $emailMed, $telMed, $sexeMed, $idSpecial;
  

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
 public function getIdMed(){ return $this->idMed;}
 public function getCodeMed(){ return $this->codeMed;}
 public function getPrenomMed(){ return $this->prenomMed;}
 public function getNomMed(){ return $this->nomMed;}
 public function getEmailMed(){ return $this->emailMed;}
 public function getTelMed(){ return $this->telMed;}
 public function getSexeMed(){ return $this->sexeMed;}
 public function getIdSpecial(){ return $this->idSpecial;}

// the setters ou mutateur
public function setIdMed($idMed){ $this->idMed=$idMed;}
public function setCodeMed($codeMed){$this->codeMed=$codeMed;}
public function setPrenomMed($prenomMed){$this->prenomMed=$prenomMed;}
public function setNomMed($nomMed){$this->nomMed=$nomMed;}
public function setEmailMed($emailMed){$this->emailMed=$emailMed;}
public function setTelMed($telMed){$this->telMed=$telMed;}
public function setSexeMed($sexeMed){$this->sexeMed=$sexeMed;}
public function setIdSpecial($idSpecial){$this->idSpecial=$idSpecial;}
}