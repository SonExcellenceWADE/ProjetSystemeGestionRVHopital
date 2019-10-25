<?php
#######********                               *********##########
########******* Coding BY SON EXCELLENECE WADE & CHEIKH MBOW **********#########
#######*********                               *********##########
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'head.php';
require_once '../setting.php';
require CALENDAR.'/Month.php';
require CALENDAR.'/ManagerRV.php';


$modif = new ManagerRV();
$idRV= (int) $_GET['editer'];
$event=$modif->findRV($idRV);

require_once CONTROLLER.'/editeRV.php'; //function de modification de RV du Patient 
?>
<div class="container">
	<div class="row">
	<div class="col-lg-8 col-lg-offset-2">
    <fieldset class="panel panel-info form-horizontal">
		<div class="panel-heading">Modifier les infos de  Rendez-Vous du Patient N°: <?= $event->codePatient;?></div>
			<div class="profile-userpic">
				<img src="../senhopital.jpeg" class="img-responsive" alt="" >
				<a class="navbar-brand" href="#"><span>Systéme de Gestion de Rendez-Vous</span> Sen-Hopital</a>
			</div>
		 
		 <div class="panel-body"> 
		 <div class="profile-sidebar"></div>
  <form  action="" method="POST">	 
  	  
<div class="form-group">
		<div class="col-lg-12">
			<label for="numRV">N°:</label>
<input type="text" name="numRV" id="numRV" class="form-control" readonly required value="<?= $event->numRV ?>"> 

</div></div>

<div class="form-group">
	<div class="col-lg-12">
	<label for="idPatient">Patient</label> 
<select name="idPatient" id="idPatient" class="form-control" required>
<?php 
$man= new Manager();
$pdo= $man->getConnexion();
	$req=$pdo->prepare("SELECT * FROM Patient ");
	$req->execute();
	while($Pat=$req->fetch(PDO::FETCH_ASSOC)){;
	 ?>  
<option value="<?= $Pat['idPatient'] ?>"> <?= $Pat['codePatient'] ?> <?= $Pat['prenomPatient'] ?> <?= $Pat['nomPatient'] ?> </option>
<?php }?>
  </select>
  
</div>
	</div>

	<div class="form-group">
	<div class="col-lg-12">
	<label for="idPlan">Planning du Medecin</label> 
<select name="idPlan" id="idPlan" class="form-control" required>
<?php 
$man= new Manager();
$pdo= $man->getConnexion();
	$req=$pdo->prepare("SELECT idPlan, heureDeb, heureFin, datePlan, codeMed, prenomMed, nomMed, nomSpecial  
	 FROM Planing, Medecin, Specialite
	 WHERE Planing.idMed= Medecin.idMed AND Medecin.idSpecial= Specialite.idSpecial  ");
	$req->execute();
	while($Plan=$req->fetch(PDO::FETCH_ASSOC)){;
	 ?>  
<option value="<?= $Plan['idPlan'] ?>"> <?= $Plan['codeMed'] ?> <?= $Plan['prenomMed'] ?> <?= $Plan['nomMed'] ?> <?= $Plan['nomSpecial'] ?> </option>
<?php }?>
  </select>
  
</div>
	</div>

	<div class="form-group">
		<div class="col-lg-12">
 
			<label for="dateRV">Date de Rendez-Vous</label>
	<input type="date" id="dateRV" name="dateRV" 
   min="2019-01-01T00:00" max="2050-01-01T00:00" maxlength="10" class="form-control" required value="<?= $event->dateRV ?>">
</div></div>


<div class="form-group">
		<div class="col-lg-12">
 
			<label for="heureRV">Heure de Rendez-Vous</label>
	<input type="time" id="heureRV" name="heureRV" class="form-control" value="<?= $event->heureRV ?>" required >
   <small> <b class="color-red"> <?php if(!empty($error['heureNot'])) echo $error['heureNot']?> </b>
</div></div>

<div class="form-group">
	<div class="col-lg-12">
<label for="duree">Durée du Rendez-Vous</label>
<input type="radio" name="duree" id="duree"  value="<?= $event->duree ?>" required> 15 mn
	</div></div>
	 
<input type="submit" name="modifier" class="btn btn-info"  value="Modifier" required>
<input type="reset" name="annuler" class="btn btn-danger"  value="Annuler" required> 	
</form>
</div>
</fieldset>
</div>
</div></div>


<?php require_once VIEW.'footer.php'; ?>