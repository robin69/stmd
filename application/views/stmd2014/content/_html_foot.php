<div class="clear"></div>
	<footer class="footer">
		 <div class="footer_container">
			 <ul class="footer_nav_top">
				 <li><a href="<?php echo base_url(); ?>rechercher-un-conseiller-a-la-securite-adr/">Trouver un conseiller à la sécurité</a></li>
				 <li><a href="<?php echo base_url("annuaire"); ?>/transporteurs-md-adr">Prestataires pour transporteurs MD</a></li>
				 <li><a href="<?php echo base_url("annuaire"); ?>/expediteurs-md-adr-iata-imdg/">Prestataires pour expéditeurs MD</a></li>
				 <li><a href="<?php echo base_url("pourquoi-s-inscrire"); ?>">Inscrire votre entreprise</a></li>
				 <li><a href="http://lists.gmjphoenix.com/?p=subscribe&id=1" class="fancybox fancybox.iframe">S’inscrire à la newsletter</a></li>
				 <li><a class="nosep" href="http://www.gmjphoenix.com" target="_blank">GMJ Phoenix</a></li>
			 </ul>
			 <ul class="footer_nav_bot">
				 <li><a href="<?php echo base_url('presentation'); ?>">Présentaiton de Solutions TMD</a></li>
				 <li><a href="<?php echo base_url('contact'); ?>">Contacts</a></li>
				 <li><a href="<?php echo base_url("mentions-legales"); ?>">Mentions légales</a></li>
				 <li><a href="#">Tous droits réservés © 2014 Solutions TMD</a></li>
				 <li><a href="http://studio-http.com">Studio http - Développeurs web à Lyon</a></li>
		     </ul>
		</div>
	</footer>

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
    <link href="<?php echo base_url("assets"); ?>/js/jquery-ui-1.11.1/jquery-ui.theme.css" rel="stylesheet" />
  	<!-- <script type="text/javascript" src="<?php echo base_url("assets"); ?>/js/jquery-1.6.2.min.js"></script> -->
	<script type="text/javascript" src="<?php echo base_url("assets"); ?>/js/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="<?php echo base_url("assets"); ?>/js/jquery.slides.min.js"></script>
	<!-- the jScrollPane script -->
	<script type="text/javascript" src="<?php echo base_url("assets"); ?>/js/jquery.mousewheel.js"></script>
	<script type="text/javascript" src="<?php echo base_url("assets"); ?>/js/jquery.contentcarousel.js"></script>

    <!-- FANCYBOX -->
    <script type="text/javascript" src="<?php echo base_url("assets"); ?>/js/fancybox/jquery.fancybox.js?v=2.1.5"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets"); ?>/js/fancybox/jquery.fancybox.css?v=2.1.5" media="screen" />



	<?php
		if(!$no_google_map){
			?>
			<!-- GOOGLE MAP API v3 -->
			<script type="text/javascript" src="//maps.google.com/maps/api/js?sensor=false"></script>
			<script type="text/javascript">
				var map = new Array();
		    </script>
			<?php
		}
	?>	
	<script type="text/javascript" src="<?php echo base_url("assets"); ?>/js/stmd.js"></script>
	<script type="text/javascript">
		$('#ca-container').contentcarousel();

        $(function(){


            $(".fancybox").fancybox();


            $("a.bookmark").click(function(){
                var bookmarkUrl = this.href;
                var bookmarkTitle = this.title;

                if ($.browser.mozilla) // For Mozilla Firefox Bookmark
                {
                    window.sidebar.addPanel(bookmarkTitle, bookmarkUrl,"");
                }
                else if($.browser.msie || $.browser.webkit) // For IE Favorite
                {
                    window.external.AddFavorite( bookmarkUrl, bookmarkTitle);
                }
                else if($.browser.opera ) // For Opera Browsers
                {
                    $(this).attr("href",bookmarkUrl);
                    $(this).attr("title",bookmarkTitle);
                    $(this).attr("rel","sidebar");
                    $(this).click();
                }
                else // for other browsers which does not support
                {
                    alert('Please hold CTRL+D and click the link to bookmark it in your browser.');
                }
                return false;
            });

        });
	</script>




</body>
</html>
