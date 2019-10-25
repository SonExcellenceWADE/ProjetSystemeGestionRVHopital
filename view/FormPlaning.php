<?php
#######********                               *********##########
########******* Coding BY SON EXCELLENECE WADE **********#########
#######*********                               *********##########
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'head.php';
require_once '../setting.php';
require_once MODEL.'ManagerPlaning.php';
require MODEL.'Planing.class.php';
require_once CONTROLLER.'AjoutPlan.php'; //inclure le fichier ajout du nouvel Planing
?>
<div class="container">
	<div class="row">
	<div class="col-lg-8 col-lg-offset-2">
    <fieldset class="panel panel-info form-horizontal">
		<div class="panel-heading">Créer un nouvel Planing  </div>
    <div class="panel-body"> 
  <form  action="" method="POST">	
      
	<div class="form-group">
		<div class="col-lg-12">
			<label for="heureDeb">Heure Debut Planning</label>
<input type="time" name="heureDeb" id="heureDeb" class="form-control"  placeholder="Heure Debut Planing" required> 
<small> <b class="color-red"> <?php if(!empty($error['heuredeb'])) echo $error['heuredeb']?> </b>
</div></div>
<div class="form-group">
		<div class="col-lg-12">
    <label for="heureFin">Heure Fin Planning</label>
  <input type="time" name="heureFin" id="heureFin" class="form-control" placeholder="Heure Fin Planing" required>		
  <small> <b class="color-red"> <?php if(!empty($error['heurefin'])) echo $error['heurefin']?> </b>
  <small> <b class="color-red"> <?php if(!empty($error['debfin'])) echo $error['debfin']?> </b>
</div></div>

<div class="form-group">
		<div class="col-lg-12">
  <label for="datePlan"> Date de Planning </label>
  <input type="date" name="datePlan" id="datePlan" class="form-control" placeholder="Date de Planing" required> 		
</div></div>

<div class="form-group">
		<div class="col-lg-12">
        <label for="idMed">Medecin</label> 
    <select name="idMed" id="idMed" class="form-control" required>
	<?php 
    $man= new Manager();
    $pdo= $man->getConnexion();
        $req=$pdo->prepare("SELECT * FROM Medecin ");
        $req->execute();
        while($Med=$req->fetch(PDO::FETCH_ASSOC)){;
         ?>  
    <option value="<?= $Med['idMed'] ?>"> <?= $Med['codeMed'] ?> <?= $Med['prenomMed'] ?> <?= $Med['nomMed'] ?> </option>
    <?php }?>
      </select>
      
    </div>
        </div>

         
<input type="submit" name="planifier" class="btn btn-info"  value="Planifier" required>
  <input type="reset" name="annuler" class="btn btn-danger"  value="Annuler" required> 	
</form>
 </div>
</fieldset>
</div>
</div></div>


<?php require_once VIEW.'footer.php'; ?>