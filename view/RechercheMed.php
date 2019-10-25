
<form action="" method="POST">
<div class="col-lg-8">
<input  type="search"  class="form-control" name="codeMed" placeholder="Rechercher un medecin  avec son code Ex:MED0000SN">
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
        <th>Email</th>
		    <th>Téléphone </th>
        <th>Sexe</th>
        <th colspan="2px">Spécialité</th>
        <th>Action</th>
    </tr>
	</thead>
<?php
if(isset($_POST['rechercher'])){
    extract($_POST);
  if(empty($_POST['codeMed']) || is_numeric($_POST['codeMed'])){
    echo " <b> Ooops:) Ce code n'existe pas ou n'est pas valide... </b>";
  }else{
    $medecin= new Medecin(array(
          'codeMed'=>$_POST['codeMed']
      ));
     $search= $manager->RechercheMed($medecin);
     ?>
<tr>
    <td><?= $search->codeMed; ?></td>
    <td><?= $search->prenomMed; ?></td>
    <td><?= $search->nomMed; ?></td>
    <td><?= $search->emailMed; ?></td>
    <td><?= $search->telMed; ?></td>
    <td><?= $search->sexeMed; ?></td>
    <td><?= $search->nomSpecial ?></td>
    <td> <a href="ModifMedecin.php?editer=<?= $search->idMed ?>" class="btn btn-info"  >Modifier</a>  </td>
    <td> <a href="../controller/deleteMedecin.php?supprimer=<?=$search->idMed ?>"  class="btn btn-danger"  onclick="return confirm('Etes vous sur de vouloir Supprimer ce Medecin n°: <?= $search->idMed?> ?')" >Supprimer</a></td>
</tr>
<?php  } } ?>
</table></div>
</div>
</form>
