<header class="header">
 	<div class="header_top">
    	<div class="logo"><a href="<?php echo base_url();?>"><img src="<?php echo base_url("assets");?>/img/logo.png" alt=" " /></a></div>
			<div class="slogan">
				<p> Le carnet d’adresses des expéditeurs et des transporteurs<br />de marchandises dangereuses </p>
			</div>
		<div class="social"> 
			<a href="#" class="gplus"></a> <a href="#" class="twitter"></a> 
			<a href="#" class="facebook"></a> <a href="#" class="linkedin"></a> 
			<a href="#" class="vimeo"></a> <a href="#" class="copy"></a> 
			<a href="#" class="favoris"></a> 
		</div>
	</div>
	
	
	<nav class="main-navigation">
    	<div class="nav_container">
			<div class="search">
				<form id="search_form" method="get" action="<?php echo base_url("recherche"); ?>/" >
					<input type="search" name="string" id="string" placeholder="Votre recherche" />
					<button></button>
				</form>
			</div>
			
			<div class="menu">
				<?php
					//On détermine le menu actif
					switch($domaine)
					{
						case "transporteurs_md"	:	$ann_tmd_activ_class = ' class="selected" ';
										$ann_emd_activ_class = ' ';
										$ann_cas_activ_class = ' ';
										break;
						case "expediteurs_md"	:	$ann_tmd_activ_class = ' ';
										$ann_emd_activ_class = ' class="selected" ';
										$ann_cas_activ_class = ' ';
										break;
						case "conseiller_securite"	:	$ann_tmd_activ_class = ' ';
										$ann_emd_activ_class = ' ';
										$ann_cas_activ_class = ' class="selected" ';
										break;
						default :		$ann_tmd_activ_class = ' ';
										$ann_emd_activ_class = ' ';
										$ann_cas_activ_class = ' ';
					}
				?>
		        <ul>
					<li <?php echo $ann_tmd_activ_class; ?>><a href="<?php echo base_url("annuaire/transporteurs-md-adr"); ?>"> Transporteurs MD<br /> <span>Annuaire des prestataires</span> </a></li>
					<li <?php echo $ann_emd_activ_class; ?>><a href="<?php echo base_url("annuaire/expediteurs-md-adr-iata-imdg"); ?>" > Expéditeurs MD<br /><span>Annuaire des prestataires</span> </a></li>
					<li <?php echo $ann_cas_activ_class; ?>><a href="<?php echo base_url("rechercher-un-conseiller-a-la-securite-adr"); ?>"> Sécurité<br /><span>Conseillers à la sécurité</span> </a></li>
		        </ul>
			</div>
      
			<div class="newsletter"> 
				<a href="<?php echo base_url("newsletter/inscription"); ?>"> Newsletter<br />
				<span>S’inscrire</span> </a> 
			</div>
			
			<div class="options"> 
				<a class="annonceur" href="<?php echo base_url('login'); ?>"> Espace<br />annonceurs </a> 
		        <a class="inscri_annuaire" href="<?php echo base_url('pourquoi-s-inscrire'); ?>"> Inscription<br />annuaire </a> 
		        <a class="information" href="<?php echo base_url('contact/demande-infos'); ?>"> Demande<br />d’informations </a> 
		        <a class="contact" href="<?php echo base_url('contact'); ?>"> Nous<br /> contacter </a>
			</div>
		</div>
	</nav>
</header>