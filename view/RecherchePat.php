
<form action="" method="POST">
<div class="col-lg-8">
<input  type="search"  class="form-control" name="codePatient" placeholder="Rechercher un Patient avec son code Ex:PAT0000SN">
</div>
<input type="submit"  name="rechercher" class="btn btn-info" value="Rechercher">
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
<?php
if(isset($_POST['rechercher'])){
    extract($_POST);
  if(empty($_POST['codePatient']) || is_numeric($_POST['codePatient'])){
    echo " <b class='color-red'> Ooops:) Ce code n'existe pas ou n'est pas valide... </b>";
  }else{
    $patient= new Patient(array(
          'codePatient'=>$_POST['codePatient']
      ));
     $search= $manager->RecherchePat($patient);
     ?>
<tr>
    <td><?= $search->codePatient; ?></td>
    <td><?= $search->prenomPatient; ?></td>
    <td><?= $search->nomPatient; ?></td>
    <td><?= $search->datenais; ?></td>
    <td><?= $search->sexe; ?></td>
    <td><?= $search->telPatient; ?></td>
    <td> <a href="ModifPatient.php?editer=<?= $search->idPatient ?>" class="btn btn-info"  >Modifier</a>  </td>
<td>  <a href="../controller/deletePatient.php?supprimer=<?= $search->idMed ?>"  class="btn btn-danger"  onclick="return confirm('Etes vous sur de vouloir Supprimer ce Medecin n°: <?= $search->idMed?> ?')" >Supprimer</a></td>
</tr>
<?php  } } ?>
</table></div>
</div>
</form>
