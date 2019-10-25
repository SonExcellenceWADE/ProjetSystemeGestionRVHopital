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

if(!isset($_GET['id'])){
  header("location: /404.php");
}
$events= new ManagerRV();
$event=$events->findRV($_GET['id']);
?>
<div class="container">
	<div class="row">
	<div class="col-lg-8 col-lg-offset-2">
    <fieldset class="panel panel-info form-horizontal">
		<div class="panel-heading">Détails de Rendez-Vous du Patient N°: <?= $event->codePatient;?></div>
			<div class="profile-userpic">
				<img src="../senhopital.jpeg" class="img-responsive" alt="" >
				<a class="navbar-brand" href="#"><span>Systéme de Gestion de Rendez-Vous</span> Sen-Hopital</a>
			</div>
		 
		 <div class="panel-body"> 
		 <div class="profile-sidebar"></div>
  <form  action="" method="POST">	 
	<div class="form-group">
			<div class="col-lg-12">

				<label for="numRV" >N°:</label>
<input type="text" name="numRV" id="numRV" class="form-control"  readonly  value="<?= $event->numRV;?>"> 

</div></div>

  
<div class="form-group">
			<div class="col-lg-12">
     
				<label for="dateRV">Date de Rendez-Vous</label>
        <input type="text" id="dateRV" name="dateRV" 
       min="2019-01-01T00:00" max="2050-01-01T00:00" maxlength="10" class="form-control"  readonly   value="<?= $event->dateRV ?>" required>
</div></div>


<div class="form-group">
			<div class="col-lg-12">
     
				<label for="heureRV">Heure de Rendez-Vous</label>
        <input type="text" id="heureRV" name="heureRV" class="form-control" readonly   value="<?= $event->heureRV ?>"  required >
       
</div></div>
<div class="form-group">
			<div class="col-lg-12">
     
				<label for="patient">Patient</label>
        <input type="text" id="idpatient" name="prenomPatient" class="form-control" readonly value="<?= $event->prenomPatient ?>"  required ><br>
        <input type="text" id="patient" name="heureRV" class="form-control" readonly value="<?= $event->nomPatient ?>"  required >
</div></div>

<div class="form-group">
			<div class="col-lg-12">
     
				<label for="medecin">Medecin</label>
        <input type="text" id="medecin" name="prenomMed" class="form-control" readonly value="<?= $event->prenomMed ?>"  required ><br>
        <input type="text" id="medecin" name="nomMed" class="form-control" readonly value="<?= $event->nomMed ?>"  required ><br>
        
</div></div>
<div class="form-group">
			<div class="col-lg-12">
      <label for="special">Spécialité</label>
      <input type="text" id="special" name="nomSpecial" class="form-control" readonly value="<?= $event->nomSpecial ?>"  required >
			</div></div>
<div class="form-group">
		<div class="col-lg-12">
  <label for="duree">Durée du Rendez-Vous(en minutes)</label>
  <input type="text" name="duree" id="duree" class="form-control" readonly value="<?= $event->duree ?> " required> 
		</div></div>
         
<input type="button" name="imprimer" class="btn btn-success hidden-print" onclick="print()"  value="Imprimer" required><br>
<span>Powered By Son Excellence WADE & Cheikh Mbow</span> 
</form>
 </div>
</fieldset>
</div>
</div></div>


<?php require_once VIEW.'footer.php'; ?>