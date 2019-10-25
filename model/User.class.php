<?php
#######********                               *********##########
########******* Coding BY SON EXCELLENECE WADE & CHIIKH MBOW**********#########
#######*********                               *********##########
error_reporting(E_ALL);
ini_set('display_errors', 1);

class User{
    private $idUser,  $login,  $motpasse, $role,  $idService;

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

//les Getters
public function getIdUser(){ return $this->idUser;}
public function getLogin(){ return $this->login;}
public function getMotpasse(){ return $this->motpasse;}
public function getRole(){ return $this->role;}
public function getIdService(){ return $this->idService;}

//les Setters
public function setIdUser($idUser){$this->idUser=$idUser;}
public function setLogin($login){$this->login=$login;}
public function setMotpasse($motpasse){$this->motpasse=$motpasse;}
public function setRole($role){$this->role=$role;}
public function setIdService($idService){$this->idService=$idService;}



}