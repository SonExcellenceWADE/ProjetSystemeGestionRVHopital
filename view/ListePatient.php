
<?php
#######********                               *********##########
########******* Coding BY SON EXCELLENECE WADE **********#########
#######*********                               *********##########
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'head.php';
require '../setting.php';
require_once MODEL.'ManagerPatient.php';
require_once MODEL.'Patient.class.php';


?>

<div class="container">
	<div class="row">
	<div class="col-lg-8 col-lg-offset-2">
	<fieldset class="panel panel-info form-horizontal">
		<div class="panel-heading">Liste des Patients Enregistrés </div>
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
        <th>Date de Naissance</th>
        <th>Sexe</th>
        <th colspan="2px">Téléphone </th>
        <th>Action</th>
    </tr>
    </thead>
  
    <?php $manager= new ManagerPatient();
          $listepat=$manager->ListePat();
          
    foreach($listepat as $liste) :?>
  <?php echo "<tr class='success' onclick='fill(".json_encode($liste).")'>";?>
   <td><?=  $liste->codePatient;?></td>
   <td><?=  $liste->prenomPatient; ?></td>
   <td><?=  $liste->nomPatient;  ?></td>
   <td><?=  $liste->datenais; ?></td>
    <td><?= $liste->sexe; ?></td>
    <td><?= $liste->telPatient;?></td>

    <td> <a href="ModifPatient.php?editer=<?= $liste->idPatient ?>" class="btn btn-info"  >Modifier</a>  </td>
    <td> <a href="../controller/deletePatient.php?supprimer=<?= $liste->idPatient ?>"  class="btn btn-danger"  onclick="return confirm('Etes vous sur de vouloir Supprimer ce Patient n°: <?= $liste->idPatient?> ?')" >Supprimer</a></td>
</tr>
<?php endforeach ?>
</table>

	   </div>
</div>

 </form></div>
</fieldset></div>
</div></div>
    
<?php require VIEW.'footer.php'; ?>