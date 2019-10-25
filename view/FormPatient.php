
<?php
#######********                               *********##########
########******* Coding BY SON EXCELLENECE WADE **********#########
#######*********                               *********##########
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'head.php';
require '../setting.php';
require_once MODEL.'ManagerPatient.php';
require  MODEL.'Patient.class.php';


$manager= new ManagerPatient();

require_once CONTROLLER.'/AjoutPatient.php'; //inclure le fichier ajout du nouvel Medecin
?>
<div class="container">
	<div class="row">
	<div class="col-lg-8 col-lg-offset-2">
    <fieldset class="panel panel-info form-horizontal">
		<div class="panel-heading">Rechercher ou Ajouter un nouvel Patient </div>
		 <div class="panel-body"> 
	<?php require_once VIEW.'RecherchePat.php'  ?>
       
  <form id="msform" action="" method="post">	
      <div class="form-group">
			<div class="col-lg-12">
				<label for="codePatient">Code</label>
<input type="text" name="codePatient" id="codePatient" class="form-control" readonly value="PAT<?php echo $manager->CodePat()?>SN" required>
	</div></div>
	<div class="form-group">
			<div class="col-lg-12">
				<label for="prenomPatient">Prenom</label>
<input type="text" name="prenomPatient" id="prenomPatient" class="form-control"  placeholder="Prenom du Patient" required>
<small> <b class="color-red"> <?php if(!empty($error['pnom'])) echo $error['pnom']?> </b> </small> 
</div></div>
<div class="form-group">
		<div class="col-lg-12">
  <label for="nomPatient">Nom</label>
  <input type="text" name="nomPatient" id="nomPatient" class="form-control" placeholder="Nom du Patient" required>
  <small> <b class="color-red"> <?php if(!empty($error['nom'])) echo $error['nom']?> </b> </small> 	
</div></div>
<div class="form-group">
		<div class="col-lg-12">
  <label for="datenais">Date de Naissance</label>
  <input type="date" name="datenais" id="datenais" class="form-control" placeholder="Date de Naissance" required>
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
  <input type="text" name="telPatient" id="telPatient" class="form-control" placeholder="Telephone  du Patient" maxlength="9" minlength="9" required>
  <small> <b class="color-red"> <?php if(!empty($error['tel'])) echo $error['tel']?> </b> </small> <br>
  <small> <b class="color-red"> <?php if(!empty($error['optel'])) echo $error['optel']?> </b> </small> 
</div></div>
        

         
<input type="submit" name="ajouter" onclick="addPatient()" class="btn btn-info"  value="Ajouter" required>
  <input type="reset" name="annuler" class="btn btn-danger"  value="Annuler" required> 	
</form>
 </div>
</fieldset>
</div>
</div></div>


<?php require_once VIEW.'footer.php' ?>
















































<?php require './footer.php'; ?>