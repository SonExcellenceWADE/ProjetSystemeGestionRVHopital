
<?php
#######********                               *********##########
########******* Coding BY SON EXCELLENECE WADE **********#########
#######*********                               *********##########
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'head.php';
require_once '../setting.php';
require_once MODEL.'/ManagerMedecin.php';
require_once MODEL.'/Medecin.class.php';


?>

<div class="container">
	<div class="row">
	<div class="col-lg-8 col-lg-offset-2">
	<fieldset class="panel panel-info form-horizontal">
		<div class="panel-heading">Liste des Medecins Enregistrés </div>
		 <div class="panel-body"> 
             <form action="" method="POST">

             <div class="card-body">
       <div class="table-responsive">
<table class="table table-hover"> 
    <thead>
    <tr>
        <th>Code</th>
        <th>Prenom</th>
        <th>Nom</th>
        <th>Email</th>
		<th>Téléphone </th>
        <th>Sexe</th>
        <th colspan="2px">Spécialité</th>
        <th>Action</th>
    </tr>
    </thead>
  
    <?php $manager= new ManagerMedecin;
          $listemed=$manager->ListeMed();
    foreach($listemed as $liste) :?>
  <tr>
   <td><?=  $liste->codeMed;?></td>
   <td><?=  $liste->prenomMed; ?></td>
   <td><?=  $liste->nomMed;  ?></td>
   <td><?=  $liste->telMed; ?></td>
    <td><?= $liste->emailMed; ?></td>
    <td><?= $liste->sexeMed;?></td>
    <td><?= $liste->nomSpecial; ?></td>
    <td> <a href="ModifMedecin.php?editer=<?= $liste->idMed ?>" class="btn btn-info"  >Modifier</a>  </td>
    <td> <a href="../controller/deleteMedecin.php?supprimer=<?= $liste->idMed ?>"  class="btn btn-danger"  onclick="return confirm('Etes vous sur de vouloir Supprimer ce Medecin n°: <?= $liste->idMed?> ?')" >Supprimer</a></td>
</tr>
<?php endforeach ?>
</table>

	   </div>
</div>

 </form></div>
</fieldset></div>
</div></div>
    
<?php require '../view/footer.php'; ?>