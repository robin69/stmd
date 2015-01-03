<aside class="main_blocks priv_menu">
	<h3>Ma Fiche</h3>
    <?php


        $this->load->model("Fiche_manager");
        $f = new Fiche_manager();
        $progress  = (int) $f->calul_progress_bar($this->session->userdata("id_user"));

    ?>
	<p>Votre fiche est renseignée à :<progress id="fiche_progress" value="<?php echo $progress; ?>" min="3" max="100"></progress>&nbsp;<?php echo $progress; ?>&nbsp;%</p>
	<hr />
    <ul id="" class="ep_menu" role="menu" tabindex="0" aria-activedescendant="ui-id-24">
        <li id="" class="" tabindex="-1" role="menuitem"><a href="<?php echo base_url("espace_inscrits/fiche_contact_form"); ?>">Le contact de la société</a></li>
        <li id="" class="" tabindex="-1" role="menuitem"><a href="<?php echo base_url("espace_inscrits/fiche_societe_form"); ?>">Les coordonnées de la société</a></li>
        <li id="" class="" tabindex="-1" role="menuitem"><a href="<?php echo base_url("espace_inscrits/fiche_descriptions"); ?>">Le descriptif de la société</a></li>
        <li id="" class="" tabindex="-1" role="menuitem"><a href="<?php echo base_url("espace_inscrits/fiche_classements"); ?>">Classement dans l'annuaire</a></li>
        <li id="" class="" tabindex="-1" role="menuitem"><a href="<?php echo base_url("espace_inscrits/fiche_res_sociaux"); ?>">Réseaux sociaux</a></li>
	</ul>
	
	<hr class="menu_separator"/>
	<h3>Mon compte</h3>
	<?php
		//On tente d'intégrer le profil gravatar
		$gravatar 	= new Gravatar($this->session->userdata("email"));
		if($gravatar->profile)
		{
			?>
			
			<div class="gravatar_profile">
				<img src="<?php echo $gravatar->profile["thumbnailUrl"]; ?>" class="main_blocks"/>
				<div class="profile main_blocks">
					<?php echo $gravatar->profile["displayName"]; ?><br />
					<?php 
					if (count($gravatar->profile["urls"])>=1)
					{
						$website = $gravatar->profile["urls"][0];
						?>
						<a href="<?php echo $website["value"]; ?>" title="<?php echo $website["title"]; ?>"><?php echo $website["title"]; ?></a>
						<?php
					}
					?>
				</div>
			</div>
			
			<?php
		}
		
	?>

	<ul class="ep_menu">
		<li><a href="<?php echo base_url("espace_inscrits/"); ?>">Accueil </a></li>
		<li><a href="<?php echo base_url("espace_inscrits/user_profil"); ?>">Mon profil utilisateur</a></li>
		<li><a href="<?php echo base_url("espace_inscrits/user_forfait"); ?>">Mon forfait</a></li>
		<li><a href="<?php echo base_url("espace_inscrits/logout"); ?>" class="dcnx">Déconnexion</a></li>
	</ul>
    <hr class="menu_separator"/>
	<h3>Informations : </h3>
		
		
	<p>Votre fiche n'est pas complète. Une fiche incomplète peut être publiée si l'ensemble des champs obligatoires ont été renseignés et si la fiche a été validée par l'administrateur du site. Utilisez le menu "Ma Fiche" pour renseigner la fiche de votre société.</p>
</aside>