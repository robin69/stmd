<div class="clear"></div>
	<footer class="footer">
		 <div class="footer_container">
			 <ul class="footer_nav_top">
				 <li><a href="<?php echo base_url("rechercher-un-conseiller-a-la-securite"); ?>">Trouver un conseiller à la sécurité</a></li>
				 <li><a href="<?php echo base_url("annuaire/transporteurs_md"); ?>">Prestataires pour transporteurs MD</a></li>
				 <li><a href="<?php echo base_url("annuaire/expediteurs_md"); ?>">Prestataires pour expéditeurs MD</a></li>
				 <li><a href="<?php echo base_url("pourquoi-s-inscrire"); ?>">Inscrire votre entreprise</a></li>
				 <li><a href="<?php echo base_url("newsletter/inscription"); ?>">S’inscrire à la newsletter</a></li>
				 <li><a class="nosep" href="http://www.gmjphoenix.com">GMJ Phoenix</a></li>
			 </ul>
			 <ul class="footer_nav_bot">
				 <li><a href="<?php echo base_url('contact'); ?>">Contacts</a></li>
				 <li><a href="<?php echo base_url("mentions-legales"); ?>">Mentions légales</a></li>
				 <li><a href="#">Tous droits réservés © 2014 Solutions TMD</a></li>
				 <li><a href="http://studio-http.com">Studio http - Développeurs web à Lyon</a></li>
		     </ul>
		</div>
	</footer>
	
	
	
	<?php
	
	?>
	
	
	<?php 
	
	/*
	*	POUR AFFICHER LE SLIDER D'IMAGE
	*	Il faut envoyer à la vue la variable
	*	$this->data["view_has_slider"] = TRUE;
	*
	*	Dans le cas contraire le script ci-dessous
	*	Génère une erreur js
	*
	******/
	if(isset($view_has_slider ) AND $view_has_slider == TRUE ) :
	?> 
	<script>
	$(function() {
	  $('#slides').slidesjs({
	    width: 940,
	    height: 528,
	    navigation: false
	  });
	
	  /*
	    To have multiple slideshows on the same page
	    they just need to have separate IDs
	  */
	  $('#slides2').slidesjs({
	    width: 940,
	    height: 528,
	    navigation: false,
	    start: 3,
	    play: {
	      auto: true
	    }
	  });
	
	  $('#slides3').slidesjs({
	    width: 940,
	    height: 528,
	    navigation: false
	  });
	});
	
	
	</script>
	<?php endif; ?>
	<!-- NE SERT QUE SUR LES PAGES DE RÉSULTATS montrant les inscrits à la une. Il faut optimiser ça au 
	chargement des autres pages -->
	<script type="text/javascript" src="<?php echo base_url("assets"); ?>/js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url("assets"); ?>/js/jquery-ui-1.11.1/jquery-ui.min.js"></script>
  	<script type="text/javascript" src="<?php echo base_url("assets"); ?>/js/jquery-1.6.2.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url("assets"); ?>/js/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="<?php echo base_url("assets"); ?>/js/jquery.slides.min.js"></script>
	<!-- the jScrollPane script -->
	<script type="text/javascript" src="<?php echo base_url("assets"); ?>/js/jquery.mousewheel.js"></script>
	<script type="text/javascript" src="<?php echo base_url("assets"); ?>/js/jquery.contentcarousel.js"></script>
	<!-- GOOGLE MAP API v3 -->	    
	<script type="text/javascript" src="//maps.google.com/maps/api/js?sensor=false"></script>
	<script type="text/javascript">
		var map = new Array();
    </script>
	<script type="text/javascript" src="<?php echo base_url("assets"); ?>/js/stmd.js"></script>
	<script type="text/javascript">
		$('#ca-container').contentcarousel();
	</script>
</body>
</html>
