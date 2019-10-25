
<?php
#######********                               *********##########
########******* Coding BY SON EXCELLENECE WADE **********#########
#######*********                               *********##########
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'head.php';
require_once '../setting.php';
require_once CALENDAR.'/ManagerRV.php';
require_once CALENDAR.'/RV.class.php';


?>

<div class="container">
	<div class="row">
	<div class="col-lg-8 col-lg-offset-2">
	<fieldset class="panel panel-info form-horizontal">
		<div class="panel-heading">Liste des Rendez-Vous Enregistrés </div>
		 <div class="panel-body"> 
             <form action="" method="POST">

             <div class="card-body">
       <div class="table-responsive">
<table class="table table-hover"> 
    <thead>
    <tr>
        <th>N°</th>
        <th>Date</th>
        <th>Heure</th>
        <th>Patient</th>
        <th>Medecin</th>
        <th>Spécialité</th>
        <th colspan="2px">Durée(mn)</th>
        <th>Action</th>
    </tr>
    </thead>
  
    <?php $manager= new ManagerRV();
          $listeRV=$manager->ListeRV();
          
    foreach($listeRV as $liste) :?>
  <tr>
   <td><?=  $liste->numRV;?></td>
   <td><?=  $liste->dateRV; ?></td>
   <td><?=  $liste->heureRV; ?></td>
   <td><?=  $liste->codePatient."  ".$liste->prenomPatient."  ".$liste->nomPatient; ?></td>
   <td><?=  $liste->codeMed."  ".$liste->prenomMed."  ".$liste->nomMed; ?></td>
    <td><?= $liste->nomSpecial; ?></td>
    <td><?=  $liste->duree; ?></td>
    <td> <a href="ModifRV.php?editer=<?= $liste->idRV ?>" class="btn btn-info"  >Modifier</a>  </td>
    <td> <a href="../controller/deleteRV.php?supprimer=<?= $liste->idRV ?>"  class="btn btn-danger"  onclick="return confirm('Etes vous sur de vouloir Supprimer ce Rendez-Vous n°: <?= $liste->idRV ?> ?')" >Supprimer</a></td>
</tr>
<?php endforeach ?>
</table>

	   </div>
</div>

 </form></div>
</fieldset></div>
</div></div>
    
<?php require '../view/footer.php'; ?>