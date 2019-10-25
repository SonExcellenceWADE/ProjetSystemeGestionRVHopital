
<?php
#######********                               *********##########
########******* Coding BY SON EXCELLENECE WADE **********#########
#######*********                               *********##########
error_reporting(E_ALL);
ini_set('display_errors', 1);
require '../setting.php';
require_once 'head.php';
require_once MODEL.'ManagerPatient.php';
require_once MODEL.'Patient.class.php';
$manager = new ManagerPatient();

require_once CONTROLLER.'editePatient.php'; //inclure le fichier de modification de Patient
?>
<div class="container">
	<div class="row">
	<div class="col-lg-8 col-lg-offset-2">
    <fieldset class="panel panel-info form-horizontal">
		<div class="panel-heading">Formulaire de Modification de Patient </div>
		 <div class="panel-body"> 

       
  <form id="register_form" action="" method="POST">	
      <div class="form-group">
			<div class="col-lg-12">
				<label for="codePatient">Code</label>
<input type="text" name="codePatient" id="codePatient" class="form-control" readonly value="<?php echo $modif->codePatient?>" required>
	</div></div>
	<div class="form-group">
			<div class="col-lg-12">
				<label for="prenomPatient">Prenom</label>
<input type="text" name="prenomPatient" id="prenomPatient" class="form-control"  value="<?php echo $modif->prenomPatient ?>" required>
<small> <b> <?php if(!empty($error['pnom'])) echo $error['pnom']?> </b> </small> 
</div></div>
<div class="form-group">
		<div class="col-lg-12">
  <label for="nomPatient">Nom</label>
  <input type="text" name="nomPatient" id="nomPatient" class="form-control" value="<?php echo $modif->nomPatient ?>" required>
  <small> <b> <?php if(!empty($error['nom'])) echo $error['nom']?> </b> </small> 	
</div></div>
<div class="form-group">
		<div class="col-lg-12">
  <label for="datenais">Date de Naissance</label>
  <input type="date" name="datenais" id="datenais" class="form-control" value="<?php echo $modif->datenais ?>" required maxlength="10" minlength="10"  >
</div></div>

<div class="form-group">
		<div class="col-lg-12">
  <label for="sexe">Sexe</label>
  <input type="radio" name="sexe" id="sexe"  value="Homme" required> Homme
  <input type="radio" name="sexe" id="sexe"  value="Femme" required> Femme
  <input type="radio" name="sexe" id="sexe"  value="Autres" required> Autres
		</div></div>

<div class="form-group">
		<div class="col-lg-12">
  <label for="telPatient">Téléphone</label>
  <input type="text" name="telPatient" id="telPatient" class="form-control" value="<?php echo $modif->telPatient ?>" maxlength="9" minlength="9" required>
  <small> <b> <?php if(!empty($error['tel'])) echo $error['tel']?> </b> </small> <br>
  <small> <b> <?php if(!empty($error['optel'])) echo $error['optel']?> </b> </small> 
</div></div>
        

         
<input type="submit" name="modifier" class="btn btn-info"  value="Modifier" required>
  <input type="reset" name="annuler" class="btn btn-danger"  value="Annuler" required> 	
</form>
 </div>
</fieldset>
</div>
</div></div>


<?php require_once VIEW.'footer.php' ?>



