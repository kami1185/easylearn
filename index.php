<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
		<title>AcdeLearn</title>

		<!-- dispostivi mobile responsive meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta name="author" content="camilo duarte">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">

		<!-- bootstrap versione 4.4.1 e validator-->
		<link rel="stylesheet" href="css/bootstrap.css">

		<link href="fontawesome5.13.0/css/fontawesome.css" rel="stylesheet">
		<link href="fontawesome5.13.0/css/brands.css" rel="stylesheet">
		<link href="fontawesome5.13.0/css/solid.css" rel="stylesheet">
		<link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
		<link href="css/bootstrap-datetimepicker.css" rel="stylesheet">
		<link href="css/pmd-datetimepicker.css" rel="stylesheet">
		<link href="css/jquery.dataTables.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />

		<!-- Main Stylesheet -->
		<link href="css/style.css" rel="stylesheet">
			
	</head>
    <body>
        <?php
			//require_once('connect_db.php');
			include('connect_db.php');
		?>

		<header class="fixed-top header">
			
				<div class="top-header py-2 bg-white">
					<div class="container">
					<div class="row no-gutters">
						<div class="col-lg-4 text-center text-lg-left">
						<a class="text-color mr-3" href="callto:+443003030266"><strong>Telefono</strong> +3478222165</a>
						<ul class="list-inline d-inline">
							<li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-color" href="https://www.facebook.com/andrescamilo.duarte" target="_blank"><i class="ti-facebook"></i></a></li>
							<li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-color" href="https://twitter.com/kamilo_andres" target="_blank"><i class="ti-twitter-alt"></i></a></li>
							<li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-color" href="https://www.linkedin.com/in/andres-camilo-duarte1185/" target="_blank"><i class="ti-linkedin"></i></a></li>
							<li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-color" href="https://www.instagram.com/andres.camilo.d/" target="_blank"><i class="ti-instagram"></i></a></li>
						</ul>
						</div>
					
					</div>
					</div>
				</div>
			
			<div class="row">
				<div class="navigation w-100">
					<div class="container">
						<nav class="navbar navbar-expand-lg navbar-dark p-0">
							<a class="navbar-brand" href="index.htmlphp"><img src="images/logo.png" alt="logo"></a>
							
							<div class="collapse navbar-collapse" id="navigation">
								<ul class="navbar-nav ml-auto text-center">
									<li class="nav-item active">
									<a class="nav-link" href="index.php">Home</a>
									</li>
									<li class="nav-item">
									<a id="scheda" class="nav-link" href="#">Scheda Utente</a>
									</li>
									<li class="nav-item">
									<a id="utente" class="nav-link" href="#">Utenti</a>
									</li>
								</ul>
							</div>
						</nav>
					</div>
				</div>
			</div>
		</header>

		<section id="background" class="hero-section overlay bg-cover" >
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<h1 class="text-white">@cdeLearn</h1>
						<p class="text-muted mb-4" data-animation-out="fadeOutRight" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInLeft" data-delay-in=".4">Cerca la esperienza formativa degli studenti</p>
						
					</div>
				</div>
			</div>
		</section>

		<section id="page-title" class="page-title-section overlay hide-content">
			<div class="container">
				<div class="row">
				<div class="col-md-8">
					<ul class="list-inline custom-breadcrumb">
					<li class="list-inline-item"><a class="h2 text-primary font-secondary" href="#">Tabella Utenti</a></li>
					
					</ul>
					<p class="text-lighten">Guarda o elimina un utente.</p>
				</div>
				</div>
			</div>
		</section>

		<section id="containerData" class="section hide-content" style="background-color:#152254">

		</section>

		<footer>
			<div class="copyright py-4 bg-footer">
				<div class="container">
				<div class="row">
					<div class="col-sm-7 text-sm-left text-center">
					<p class="mb-0">Copyright
						<script>
						var CurrentYear = new Date().getFullYear()
						document.write(CurrentYear)
						</script> 
						© Andres C@milo Duarte Eraso</p>
					</div>
					<div class="col-sm-5 text-sm-right text-center">
					<ul class="list-inline">
						<li class="list-inline-item"><a class="d-inline-block p-2" href="https://www.facebook.com/andrescamilo.duarte" target="_blank"><i class="ti-facebook text-primary"></i></a></li>
						<li class="list-inline-item"><a class="d-inline-block p-2" href="https://twitter.com/kamilo_andres" target="_blank"><i class="ti-twitter-alt text-primary"></i></a></li>
						<li class="list-inline-item"><a class="d-inline-block p-2" href="https://www.linkedin.com/in/andres-camilo-duarte1185/" target="_blank"><i class="ti-linkedin text-primary"></i></a></li>
						<li class="list-inline-item"><a class="d-inline-block p-2" href="https://www.instagram.com/andres.camilo.d/" target="_blank"><i class="ti-instagram text-primary"></i></a></li>
					</ul>
					</div>
				</div>
				</div>
			</div>
		</footer>
		
		
		<script src="js/jquery-3.5.1.min.js"></script>
		<script src="js/bootstrap.js"></script>
		<script src="js/jquery.serializejson.js"></script>
		<script src="js/index.js"></script>
		<script src="js/moment-with-locales.js"></script>
		<script src="js/bootstrap-datetimepicker.js"></script>
		<script src="js/jquery.dataTables.min.js"></script>
  		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
		<!-- <script src="js/scheda.js"></script> -->
    </body>
</html>
