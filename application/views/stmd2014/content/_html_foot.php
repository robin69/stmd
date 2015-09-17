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


    <script src="//code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>
	<!--<script type="text/javascript" src="<?php /*echo base_url("assets"); */?>/js/jquery-1.11.1.min.js"></script>-->
	<script type="text/javascript" src="<?php echo base_url("assets"); ?>/js/jquery-ui-1.11.1/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url("assets"); ?>/js/jquery.easing.1.3.js"></script>
    <!-- jQuery Slick Slide -->
    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.4.1/slick.min.js"></script>

    <!-- FANCYBOX -->
    <script type="text/javascript" src="<?php echo base_url("assets"); ?>/js/fancybox/jquery.fancybox.js?v=2.1.5"></script>



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


        $(document).ready(function(){


            $(".fancybox").fancybox();
            $(".sendToFriend").fancybox({});

        });


	</script>




</body>
</html>
