
<?php
#######********                               *********##########
########******* Coding BY SON EXCELLENECE WADE **********#########
#######*********                               *********##########
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'head.php';
require_once '../setting.php';
require_once MODEL.'/ManagerPlaning.php';
require_once MODEL.'/Planing.class.php';


?>

<div class="container">
	<div class="row">
	<div class="col-lg-8 col-lg-offset-2">
	<fieldset class="panel panel-info form-horizontal">
		<div class="panel-heading">Liste des Planing Enregistrés </div>
		 <div class="panel-body"> 
             <form action="" method="POST">

             <div class="card-body">
       <div class="table-responsive">
<table class="table table-hover"> 
    <thead>
    <tr>
        <th>Heure de Début Planning</th>
        <th>Heure de Fin Planning</th>
        <th colspan="1px">Date de Planning</th>
        <th colspan="2px">Medecin</th>
        <th>Action</th>
    </tr>
    </thead>
  
    <?php $manager= new ManagerPlaning();
          $listeplan=$manager->ListePlan();
    foreach($listeplan as $liste) :?>
  <tr>
   <td><?=  $liste->heureDeb;?></td>
   <td><?=  $liste->heureFin; ?></td>
   <td><?=  $liste->datePlan; ?></td>
    <td><?= $liste->codeMed."  ".$liste->prenomMed."  ".$liste->nomMed; ?></td>
    <td> <a href="ModifPlaning.php?editer=<?= $liste->idPlan ?>" class="btn btn-info"  >Modifier</a>  </td>
    <td> <a href="../controller/deletePlan.php?supprimer=<?= $liste->idPlan ?>"  class="btn btn-danger"  onclick="return confirm('Etes vous sur de vouloir Supprimer ce Planing n°: <?= $liste->idPlan?> ?')" >Supprimer</a></td>
</tr>
<?php endforeach ?>
</table>

	   </div>
</div>

 </form></div>
</fieldset></div>
</div></div>
    
<?php require '../view/footer.php'; ?>