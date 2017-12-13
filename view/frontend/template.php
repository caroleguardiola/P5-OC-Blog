<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?= $title ?></title>
		
		<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

		<link rel="shortcut icon" href="public/images/favicon_16.png">

		<!-- Bootstrap -->
		<link href="public/css/bootstrap.min.css" rel="stylesheet">
		<link href="public/css/font-awesome.min.css" rel="stylesheet">
		<link href="public/css/devicons.min.css" rel="stylesheet">


		<link href="public/css/owl.carousel.css" rel="stylesheet">
		<link href="public/css/owl.theme.css" rel="stylesheet">
		<link href="public/css/owl.transitions.css" rel="stylesheet">

		<link href="public/css/style.css" rel="stylesheet">




		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="js/html5shiv.min.js"></script>
		<script src="js/respond.min.js"></script>
		<![endif]-->
	</head>
	<body data-spy="scroll" data-target=".main-nav">
		<header class="st-navbar">
			<nav class="navbar navbar-default navbar-fixed-top clearfix" role="navigation">
				<div class="container"><!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sept-main-nav">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="index.php">Carole Guardiola</a>
					</div>
					
					<div class="collapse navbar-collapse main-nav" id="sept-main-nav">
						<ul class="nav navbar-nav navbar-right">
							<li><a href="index.php">Accueil</a></li>
							<li class="dropdown">
				              <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">
				                Blog 
				              </a>
					              <ul class="dropdown-menu">
					              	<li><a href="index.php?action=listPosts">Articles récents</a></li>
					                <li><a href="index.php?action=creationPost">Création d'un article</a></li>
					              </ul>
				            </li>
							<li><a href="index.php#contact">Contact</a></li>
						</ul>
					</div><!-- /.navbar-collapse -->
				</div>
			</nav>
		</header>

		<?= $content ?>

		<footer id="footer"> 
			<div class="container"> 
				<div class="text-center"> 
					<p>Copyright &copy; 2017 - <a href="#">Carole Guardiola</a> | Tous droits réservés</p> 
					<p style="font-size: 10px;">Site "projet étudiant" réalisé dans le cadre du parcours Développeur d'applications PHP/Symfony d'OpenClassrooms.</p>
				</div> 
			</div> 
		</footer> <!--/#footer--> 

		<a href="#" class="scrollup"><i class="fa fa-angle-up"></i></a>	
		
		
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="public/js/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="public/js/bootstrap.min.js"></script>
		<script src="public/js/jquery.easing.min.js"></script>
		<script src="public/js/jquery.stellar.js"></script>
		<script src="public/js/jquery.appear.js"></script>
		<script src="public/js/jquery.nicescroll.min.js"></script>
		<script src="public/js/jquery.countTo.js"></script>
		<script src="public/js/jquery.shuffle.modernizr.js"></script>
		<script src="public/js/jquery.shuffle.js"></script>
		<script src="public/js/owl.carousel.js"></script>
		<script src="public/js/jquery.ajaxchimp.min.js"></script>
		<script src="public/js/script.js"></script>
	</body>
</html>
