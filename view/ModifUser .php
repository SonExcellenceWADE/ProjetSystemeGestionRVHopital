<?php
#######********                               *********##########
########******* Coding BY SON EXCELLENECE WADE **********#########
#######*********                               *********##########
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'head.php';
require_once '../setting.php';
require_once MODEL.'ManagerMedecin.php';
require MODEL.'Medecin.class.php';

$manager= new ManagerMedecin();

require_once CONTROLLER.'AjoutUser.php'; //inclure le fichier ajout du nouvel Medecin
?>
<div class="container">
	<div class="row">
	<div class="col-lg-8 col-lg-offset-2">
    <fieldset class="panel panel-info form-horizontal">
		<div class="panel-heading">Créer un nouvel compte utilisateur </div>
		 <div class="panel-body"> 

       
  <form  action="" method="POST">	
      
	<div class="form-group">
			<div class="col-lg-12">
				<label for="login">Login</label>
<input type="text" name="login" id="login" class="form-control"  placeholder="Login" required>
<small> <b> <?php if(!empty($error['login'])) echo $error['login']?> </b> </small> 
</div></div>
<div class="form-group">
		<div class="col-lg-12">
  <label for="motpasse">Mot de Passe</label>
  <input type="password" name="motpasse" id="motpasse" class="form-control" placeholder="Mot de Passe" required>
  <small> <b> <?php if(!empty($error['motpasse'])) echo $error['motpasse']?> </b> </small> 		
</div></div>
<div class="form-group">
		<div class="col-lg-12">
  <label for="role">Role</label>
  <select name="role" id="role" class="form-control" required>
      <option value="Admin">Admin</option>
      <option value="Secretaire">Sécretaire</option>
      <option value="Medecin">Medecin</option>
  </select>


        <div class="form-group">
		<div class="col-lg-12">
        <label for="idserv">Service</label> 
    <select name="idService" id="idService" class="form-control" required>
	<?php 
    $man= new Manager();
    $pdo= $man->getConnexion();
        $req=$pdo->prepare("SELECT * FROM Service ");
        $req->execute();
        while($Serv=$req->fetch(PDO::FETCH_ASSOC)){;
         ?>  
    <option value="<?= $Serv['idService'] ?>"> <?= $Serv['nomService'] ?> </option>
    <?php }?>
      </select>
      
    </div>
        </div>

         
<input type="submit" name="inscrire" class="btn btn-info"  value="S'inscrire" required>
  <input type="reset" name="annuler" class="btn btn-danger"  value="Annuler" required> 	
</form>
 </div>
</fieldset>
</div>
</div></div>


<?php require_once VIEW.'footer.php'; ?>