<?php
#######********                               *********##########
########******* Coding BY SON EXCELLENECE WADE & CHEIKH MBOW **********#########
#######*********                               *********##########
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'headUser.php';
require_once '../setting.php';
require CALENDAR.'/Month.php';
require CALENDAR.'/ManagerRV.php';

require_once CONTROLLER.'AjoutRV.php'; //inclure le fichier ajout du nouvel Planing
$manager= new ManagerRV();

$events= new ManagerRV();
    $month = new Calendar\Month($_GET['month'] ?? null, $_GET['year'] ?? null); 
    $dateRV= $month->getStartingDay();
    $dateRV= $dateRV->format('N')=== '1' ? $dateRV: $month->getStartingDay()->modify('last monday'); 
    $weeks= $month->getWeeks();
    $end=(clone $dateRV)->modify('+'.(6 + 7 * ($weeks - 1)). 'days');
   $events = $events->getEventsBetweenByDay($dateRV);
  ?>

    <div class="d-flex flex-row align-items-center justify-content-between mx-sm-3">

    <h1><?= $month->toString();?></h1>
   
<div>
    <a href="FormRV.php?month=<?= $month->previousMonth()->month; ?>&year=<?= $month->previousMonth()->year; ?>" class="btn btn-primary">&lt;</a>
    <a href="FormRV.php?month=<?= $month->nextMonth()->month; ?>&year=<?= $month->nextMonth()->year; ?>" class="btn btn-primary">&gt;</a>
</div>
</div>
<table class="calendar__table calendar__table--<?= $month->Weeks; ?>weeks">
    <?php for ($i=0; $i < $weeks; $i++): ?>

    <tr>
        <?php foreach($month->days as $k => $day) :
            $date=(clone $dateRV)->modify("+".($k + $i * 7)."days");
            $eventsForDay= $events[$date->format('Y-m-d')] ??[];
           ?>
        <td class="<?=$month->withinMonth($date)? '' : 'calendar__othermonth'; ?>">
            <?php if($i===0): ?>
            <div class="calendar__weekday"><?= $day ?></div>
<?php endif; ?>
       <div class="class calendar__day"><?= $date->format('d');?></div>
       <?php 
       foreach ($eventsForDay as $event): ?>
       <div class="calendar__events">
       <?= (new DateTime($event->heureRV))->format('H:i')?>-<a href="Resultat.php?id=<?=$event->idRV; ?>"><?= $event->numRV; ?> 
       <?=$event->nomSpecial; ?></a>
       </div>
        <?php endforeach; ?>
    </td>
<?php endforeach; ?>
    </tr>

<?php endfor; ?>

  </table>
<div class="container">
	<div class="row">
	<div class="col-lg-10 col-lg-offset-1">
    <fieldset class="panel panel-info form-horizontal">
		<div class="panel-heading">Créer un nouvel Rendez-Vous</div>
		 <div class="panel-body"> 

       
  <form  action="" method="POST">	

      
	<div class="form-group">
			<div class="col-lg-12">
				<label for="numRV">N°:</label>
<input type="text" name="numRV" id="numRV" class="form-control"  placeholder="N° du Rendez-Vous"  readonly required value="RV-<?php echo $manager->NumRV()?>"> 

</div></div>

  <div class="form-group">
		<div class="col-lg-12">
        <label for="idPatient">Patient</label> 
    <select name="idPatient" id="idPatient" class="form-control" required>
	<?php 
    $man= new Manager();
    $pdo= $man->getConnexion();
        $req=$pdo->prepare("SELECT * FROM Patient ");
        $req->execute();
        while($Pat=$req->fetch(PDO::FETCH_ASSOC)){;
         ?>  
    <option value="<?= $Pat['idPatient'] ?>"> <?= $Pat['codePatient'] ?> <?= $Pat['prenomPatient'] ?> <?= $Pat['nomPatient'] ?> </option>
    <?php }?>
      </select>
      
    </div>
        </div>

        <div class="form-group">
		<div class="col-lg-12">
        <label for="idPlan">Planning du Medecin</label> 
    <select name="idPlan" id="idPlan" class="form-control" required>
	<?php 
    $man= new Manager();
    $pdo= $man->getConnexion();
        $req=$pdo->prepare("SELECT idPlan, heureDeb, heureFin, datePlan, codeMed, prenomMed, nomMed, nomSpecial  
         FROM Planing, Medecin, Specialite
         WHERE Planing.idMed= Medecin.idMed AND Medecin.idSpecial= Specialite.idSpecial  ");
        $req->execute();
        while($Plan=$req->fetch(PDO::FETCH_ASSOC)){;
         ?>  
    <option value="<?= $Plan['idPlan'] ?>"> <?= $Plan['codeMed'] ?> <?= $Plan['prenomMed'] ?> <?= $Plan['nomMed'] ?> <?= $Plan['nomSpecial'] ?> </option>
    <?php }?>
      </select>
      
    </div>
        </div>

        <div class="form-group">
			<div class="col-lg-12">
     
				<label for="dateRV">Date de Rendez-Vous</label>
        <input type="date" id="dateRV" name="dateRV" 
       min="2019-01-01T00:00" max="2050-01-01T00:00" maxlength="10" class="form-control" required>
</div></div>


<div class="form-group">
			<div class="col-lg-12">
     
				<label for="heureRV">Heure de Rendez-Vous</label>
        <input type="time" id="heureRV" name="heureRV" class="form-control" placeholder="Heure de Rendez-Vous 08h-12h 15h-17h" required >
       <small> <b class="color-red"> <?php if(!empty($error['heureNot'])) echo $error['heureNot']?> </b>
</div></div>

<div class="form-group">
		<div class="col-lg-12">
  <label for="duree">Durée du Rendez-Vous</label>
  <input type="radio" name="duree" id="duree"  value="15" required> 15 mn
		</div></div>
         
<input type="submit" name="reserver" class="btn btn-info"  value="Réserver" required>
  <input type="reset" name="annuler" class="btn btn-danger"  value="Annuler" required> 	
</form>
 </div>
</fieldset>
</div>
</div></div>


<?php require_once VIEW.'footer.php'; ?>