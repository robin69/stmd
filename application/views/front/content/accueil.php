<!DOCTYPE html>
<html>
<head>

		<title>stmd</title>
		
		
		<!-- TAGS BOOTSTRAP -->
		<!-- On ouvre la fenêtre à la largeur de l'écran -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

		<!-- Optional theme -->
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">

		<!-- Latest compiled and minified JavaScript -->
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		
		<meta charset="utf-8">
		<link href="<?php echo base_url("assets/"); ?>/css/styles.css" rel="stylesheet" />
		<link href="<?php echo base_url("assets/"); ?>/css/style_carousel.css" rel="stylesheet" />
		<link href='http://fonts.googleapis.com/css?family=Lato:400,300italic,300' rel='stylesheet' type='text/css'>
		
</head>
<body id="landing_page">
		<div class="container-fluid">
			<div class="row header_top">
				<div class="col-md-8"></div>
				<div class="col-md-4 social">
					<a href="home.html#" class="gplus"></a> <a href="home.html#" class="twitter"></a> <a href="home.html#" class="facebook"></a> <a href="home.html#" class="linkedin"></a> <a href="home.html#" class="viadeo"></a> <a href="home.html#" class="connexion">connexion</a> <a href="home.html#" class="copy"></a> <a href="home.html#" class="favoris"></a>
				</div>
			</div><!-- HEOF header_top -->
			<div class="row header_home">
				<div class="col-md-4"></div>
				<div class="col-md-4">
					<center>
						<a href="<?php echo base_url(); ?>"><img src="<?php echo base_url("assets/"); ?>/img/logo_home.png" alt=" " /></a>
						<div class="slogan">
							<p> Le carnet d’adresses des expéditeurs et des transporteurs<br /> de marchandises dangereuses </p>
						</div>
					</center>
				</div>
				<div class="col-md-4"></div>	
			</div><!-- HEOF header_home -->
			
			<div class="row home">
				<center>
						<h1>Moteur de recherche et annuaire</h1>
						
						<p class="top_description">
						Numéro 1 Français pour le transport de marchandises dangereuses
						</p>
				</center>
				<div class="home_search">
					<input type="text" placeholder="Tapez votre recherche ici"/><button></button>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-4">
					<center>
						<a href="<?php echo site_url(); ?>annuaire/transporteurs-md/" class="transporteur_md">Transporteurs MD
						<span>Inscrivez-vous maintenant dans l’annuaire</span></a>
					</center>
				</div>
				
				<div class="col-md-4">
					<center>
						<a href="<?php echo site_url(); ?>annuaire/expediteurs-md/" class="expediteur_md">Expéditeurs MD
						<span>Inscrivez-vous maintenant dans l’annuaire</span></a>
					</center>
				</div>
				
				<div class="col-md-4">
					<center>
						<a href="<?php echo site_url(); ?>conseiller/recherche/" class="conseiller_md">Conseiller à la sécurité
						<span>Inscrivez-vous maintenant dans l’annuaire</span></a>
					</center>
				</div>
			</div>
			
			<div class="row home_carousel">
				<div class="home_carousel_cont">
					<div id="ca-container" class="ca-container">
					
					
					<div class="ca-wrapper">
	
						<div class="ca-item col-md-4">
							<div class="ca-item-main">
									<h3>L’ ANCS a déjà 10 ans</h3>
									<p>
		                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore utate velit esse molestie cons <strong>...</strong>
		                            </p>
										
							</div>
						</div>
		                    
		                    
		                    <div class="ca-item col-md-4">
								<div class="ca-item-main">
									<h3>Mouvements transfrontièresdes déchets</h3>
									<p>
		                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore utate velit esse molestie cons <strong>...</strong>
		                            </p>
										
								</div>
							</div>
		                    
		                    <div class="ca-item col-md-4">
								<div class="ca-item-main">
									<h3>Arrêté TMD, refonte du rapport annuel d’actitvité</h3>
									<p>
		                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore utate velit esse molestie cons <strong>...</strong>
		                            </p>
										
								</div>
							</div>
		                    
		                    <div class="ca-item col-md-4">
								<div class="ca-item-main">
									<h3>Arrêté TMD, refonte du rapport annuel d’actitvité</h3>
									<p>
		                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore utate velit esse molestie cons <strong>...</strong>
		                            </p>
										
								</div>
							</div>          
						</div>
					</div>
				</div>
			</div>
			
			<footer class="row footer">
			  <div class="footer_container">
			    <ul class="footer_nav_top">
			      <li><a href="<?php echo site_url(); ?>">Trouver un conseiller à la sécurité</a></li>
			      <li><a href="<?php echo base_url(); ?>">Prestataires pour transporteurs MD</a></li>
			      <li><a href="<?php echo base_url(); ?>">Prestataires pour expéditeurs MD</a></li>
			      <li><a href="<?php echo base_url(); ?>">Inscrire votre entreprise</a></li>
			      <li><a href="<?php echo base_url(); ?>">S’inscrire à la newsletter</a></li>
			      <li><a class="nosep" href="<?php echo base_url(); ?>">GMJ Phoenix</a></li>
			    </ul>
			    <ul class="footer_nav_bot">
			      <li><a href="<?php echo base_url(); ?>">Contacts</a></li>
			      <li><a href="<?php echo base_url(); ?>">Mentions légales</a></li>
			      <li><a href="<?php echo base_url(); ?>">© 2014 Solutions TMD</a></li>
			      <li><a href="<?php echo base_url(); ?>">Studio http</a></li>
			    </ul>
			  </div>
			</footer>
		</div> <!-- END OF CONTAINER FLUID -->
			
			
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> <!-- BOOTSTRAP -->
		<!-- Intégration de la libraire de composants du Bootstrap -->
		<script src="<?php echo base_url("assets/"); ?>/bootstrap/js/bootstrap.min.js"></script>
			
		<script type="text/javascript" src="<?php echo base_url("assets/"); ?>/js/jquery.easing.1.3.js"></script>
		<!-- the jScrollPane script -->
		<script type="text/javascript" src="<?php echo base_url("assets/"); ?>/js/jquery.mousewheel.js"></script>
		<script type="text/javascript" src="<?php echo base_url("assets/"); ?>/js/jquery.contentcarousel.js"></script>
		<!-- Intégration de la libraire jQuery -->

			
		<script type="text/javascript">
			$('#ca-container').contentcarousel();
		</script>
</div><!-- end of container fluid -->			
</body>
</html>
