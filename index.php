<?php
#######********                               *********##########
########******* Coding BY SON EXCELLENECE WADE **********#########
#######*********                               *********##########
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once './setting.php';
require_once CONTROLLER.'ControlUser.php';
//require_once MODEL.'/Manager.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestion de Rendez-Vous Hopital</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/datepicker3.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo ASSETS ?>/css/jquery-ui.css">
    <link rel="stylesheet" href="<?php echo ASSETS ?>/css/jquery.timepicker.min.css">
	<link rel="stylesheet" href="<?php echo ASSETS ?>/css/bootstrap.min.css">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
   
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
									<a href="index.php" class="pull-left">
									<em class="fa fa-user"> Se connecter </em>

									</a>
									<a href="./view/FormUser.php" class="pull-left">
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
		</div>

</nav>

    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
				<div class="panel-heading"> <img src="senhopital.jpeg" alt="" width="100px" height="50px">
				<a href="#">Sen-Hopital</a><span>,Gestion Rendez-Vous</span> </div>
                <div class="panel-body">
                    <form role="form" method="POST">
                        <fieldset>
                            <div class="form-group">
                            <input type="text" name="login" id="login" class="form-control"  placeholder="Login" required>
                            </div>
                            <div class="form-group">
                            <input type="password" name="motpasse" id="motpasse" class="form-control" placeholder="Mot de Passe" required>
                            </div>
                            <div class="checkbox">
                                <label>
									<input name="remember" type="checkbox" value="remember">Mémoriser
								</label>
                            </div>
                            <input type="submit" class="btn btn-primary" name="connecter" value="Se connecter">
                            <a href="./view/FormUser.php" > Créer un compte</a>
                            <a href="index.php" > Mot de Passe oublié ?</a>

                        </fieldset>
                            
                    </form>
                </div>
            </div>
        </div>
       
    </div>
  


    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>