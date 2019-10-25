<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Gestion Rendez-Vous Hopital</title>
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/font-awesome.min.css" rel="stylesheet">
	<link href="../css/datepicker3.css" rel="stylesheet">
	<link href="../css/styles.css" rel="stylesheet">
	<link href="../css/calendar.css" rel="stylesheet">
	<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo ASSETS ?>/css/jquery-ui.css">
    <link rel="stylesheet" href="<?php echo ASSETS ?>/css/jquery.timepicker.min.css">
	<link rel="stylesheet" href="<?php echo ASSETS ?>/css/bootstrap.min.css">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#"><span>Gestion Rendez-Vous </span>Sen-Hopital</a>
				<ul class="nav navbar-top-links navbar-right">

                   
                <li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
					<em class="fa fa-user"></em><span class="label label-danger">2</span>
					</a>
					<ul class="dropdown-menu ">
					<li>
								<div class="dropdown">
									<a href="../index.php" class="pull-left">
									<em class="fa fa-power-off"> Déconnexion </em>

									</a>
									<a href="FormUser.php" class="pull-left">
									<em class="fa fa-user"> S'inscrire </em>
									</a>
									
								</div>
							</li>
					</ul>	
				</li>

					<li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
						<em class="fa fa-envelope"></em><span class="label label-danger">15</span>
					</a>
						<ul class="dropdown-menu dropdown-messages">
							<li>
								<div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
									<img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff">
									</a>
									<div class="message-body"><small class="pull-right">3 mins apres</small>
										<a href="#"><strong>Son Excellence WADE</strong> commented on <strong>your photo</strong>.</a>
									<br /><small class="text-muted">10h:33mn - 16/10/2019</small></div>
								</div>
							</li>
							<li class="divider"></li>
							<li>
								<div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
									<img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff">
									</a>
									<div class="message-body"><small class="pull-right">1 heure apres</small>
										<a href="#">New message from <strong>Cheikh Mbow</strong>.</a>
									<br /><small class="text-muted">11h:20mn - 16/10/2019</small></div>
								</div>
							</li>
							<li class="divider"></li>
							<li>
								<div class="all-button"><a href="#">
									<em class="fa fa-inbox"></em> <strong>All Messages</strong>
								</a></div>
							</li>
						</ul>
					</li>
					<li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
						<em class="fa fa-bell"></em><span class="label label-info">5</span>
					</a>
						<ul class="dropdown-menu dropdown-alerts">
							<li><a href="#">
								<div><em class="fa fa-envelope"></em> 1 New Message
									<span class="pull-right text-muted small">3 mins ago</span></div>
							</a></li>
							<li class="divider"></li>
							<li><a href="#">
								<div><em class="fa fa-heart"></em> 12 New Likes
									<span class="pull-right text-muted small">4 mins ago</span></div>
							</a></li>
							<li class="divider"></li>
							<li><a href="#">
								<div><em class="fa fa-user"></em> 5 New Followers
									<span class="pull-right text-muted small">4 mins ago</span></div>
							</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="../senhopital.jpeg" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name">Admin</div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>En ligne</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li class="active"><a href="../home.php"><em class="fa fa-dashboard">&nbsp;</em>Gestion des Données</a></li>
			
			<!-- 	SCRYPT GESTION DES MEDECINS HTML BY SON EXCELLENCE WADE -->
			<li class="parent "><a data-toggle="collapse" href="#sub-item-1">
				<em class="fa fa-navicon">&nbsp;</em>Gestion Patient<span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li><a class="fa fa-clone" href="FormPatient.php">
						<span class="fa fa-arrow-right">Nouvel Patient</span> 
					</a></li>
					<li><a class="fa fa-clone" href="ListePatient.php">
						<span class="fa fa-arrow-right">Liste des Patients</span> 
					</a></li>
					
				</ul>
			</li>
   <!-- 	SCRYPT GESTION DES MEDECINS HTML BY SON EXCELLENCE WADE -->
			<li class="parent "><a data-toggle="collapse" href="#sub-item-2">
			<em class="fa fa-navicon">&nbsp;</em>Gestion Medecin<span data-toggle="collapse" href="#sub-item-2" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-2">
					<li><a class="fa fa-clone" href="FormMedecin.php">
						<span class="fa fa-arrow-right">Nouvel Medecin</span> 
					</a></li>
					<li><a class="fa fa-clone" href="ListeMedecin.php">
						<span class="fa fa-arrow-right">Liste des Medecins</span> 
					</a></li>
				</ul>
			</li>
					<!-- 	SCRYPT GESTION DES Planing HTML BY SON EXCELLENCE WADE -->
					<li class="parent "><a data-toggle="collapse" href="#sub-item-3">
	   <em class="fa fa-navicon">&nbsp;</em>Gestion Planing<span data-toggle="collapse" href="#sub-item-3" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-3">
					<li><a class="fa fa-clone" href="FormPlaning.php">
						<span class="fa fa-arrow-right">Nouvel Planing</span> 
					</a></li>
					<li><a class="fa fa-clone" href="ListePlaning.php">
						<span class="fa fa-arrow-right">Liste des Planing</span> 
					</a></li>
					
				</ul>
		
				</li>

				<!-- 	SCRYPT GESTION DES Rendez-vous HTML BY SON EXCELLENCE WADE -->
			<li class="parent "><a data-toggle="collapse" href="#sub-item-4">
			<em class="fa fa-navicon">&nbsp;</em>Rendez-Vous<span data-toggle="collapse" href="#sub-item-4" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-4">
					<li><a class="fa fa-clone" href="FormRV.php">
						<span class="fa fa-arrow-right">Nouvel Rendez-Vous</span> 
					</a></li>
					<li><a class="fa fa-clone" href="ListeRV.php">
						<span class="fa fa-arrow-right">Liste des Rendez-Vous</span> 
					</a></li>
					
				</ul>
		
				</li>

			<li><a href="../index.php"><em class="fa fa-power-off">&nbsp;</em>Déconnexion</a></li>
		</ul>
	</div>