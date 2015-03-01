<div class="pagetop">
	<div class="head pagesize"> <!-- *** head layout *** -->
		<div class="head_top">
			<div class="topbuts">
				<ul class="clear">
				<li><a href="<?php echo site_url(); ?>" target="_blank">Voir le site</a></li>
				<li><a href="<?php echo site_url("admin/utilisateurs/logout"); ?>" class="red">Déconnexion</a></li>
				</ul>
				
				<div class="user clear">
					<img src="<?php echo base_url("assets/admin"); ?>/images/avatar.jpg" class="avatar" alt="" />
					<span class="user-detail">
						<span class="name">Bienvenue <?php echo $this->session->userdata("prenom"); ?> <?php echo $this->session->userdata("nom"); ?></span>
						<span class="text">Connecté en tant qu'Admin</span>
					</span>
				</div>
			</div>
			
			<div class="logo clear">
			<a href="<?php echo site_url("admin/dashboard"); ?>" title="View dashboard">
				<img src="<?php echo base_url("assets/admin"); ?>/images/logo_earth.png" alt="" class="picture" />
				<span class="textlogo">
					<span class="title">STMD</span>
					<span class="text">panel d'administration</span>
				</span>
			</a>
			</div>
		</div>
		
		<div class="menu">
			<ul class="clear">
				<li <?php if($activ_menu == "dashboard"){ echo 'class="active" '; }?>  ><a href="<?php echo site_url("admin/dashboard"); ?>">Tableau de bord</a></li>
				<<li <?php if($activ_menu == "moderation"){ echo 'class="active" '; } ?>  ><a href="<?php echo site_url("admin/moderation"); ?>/mod_forfait">Modération</a>
                    <ul>
                        <li><a href="<?php echo site_url("admin/moderation"); ?>/mod_infos">Changement d'infos dans la fiche</a></li>
                        <li><a href="<?php echo site_url("admin/moderation"); ?>/mod_reglement">En attente de règlement</a></li>
                        <li><a href="<?php echo site_url("admin/moderation"); ?>/mod_forfait">Demande de changement de forfait</a></li>
                    </ul>
                </li>
                <li <?php if($activ_menu == "fiches"){ echo 'class="active" '; } ?>  ><a href="<?php echo site_url("admin/inscrits"); ?>/liste">Les fiches</a>
					<ul>
						<li><a href="<?php echo site_url("admin/inscrits"); ?>/liste">Toutes les fiches</a></li>
						<li><a href="<?php echo site_url("admin/inscrits"); ?>/add">Ajouter une fiche</a></li>
						<li><a href="<?php echo site_url("admin/inscrits"); ?>/import">Importer des fiches</a></li>
						<li><a href="<?php echo site_url("admin/inscrits"); ?>/import_from_old_site">Script de migration des fiches</a></li>
					</ul>
				</li>
				<li <?php if($activ_menu == "utilisateurs"){ echo 'class="active" '; } ?>  ><a href="<?php echo site_url("admin/utilisateurs"); ?>/liste">Les utilisateurs</a>
					<ul>
						<li><a href="<?php echo site_url("admin/utilisateurs"); ?>/liste">Tous les utilisateurs</a></li>
						<li><a href="<?php echo site_url("admin/utilisateurs"); ?>/add">Ajouter un utilisateur</a></li>
					</ul>
				
				</li>
				<li <?php if($activ_menu == "categories"){ echo 'class="active" '; } ?>  ><a href="<?php echo site_url("admin/categories"); ?>/liste">Les catégories</a>
					<ul>
						<li><a href="<?php echo site_url("admin/categories"); ?>/liste">Toutes les catégories</a></li>
						<li><a href="<?php echo site_url("admin/categories"); ?>/add">Ajouter une catégories</a></li>
					</ul>
				
				</li>
				<li <?php if($activ_menu == "contenus"){ echo 'class="active" '; } ?>  ><a href="<?php echo site_url("admin/contenus"); ?>/liste">Les contenus</a>
				<ul>
					<li><a href="boxes.html">Content Boxes</a></li>
					<li><a href="columns.html">Columns</a>
						<ul>
							<li><a href="columns1.html">Boxes in Columns</a></li>
							<li><a href="columns2.html">Columns in Boxes</a></li>
						</ul>
					</li>
					<li><a href="forms.html">Forms</a></li>
				</ul>				
			</li>
			<li <?php if($activ_menu == "paramètres"){ echo 'class="active" '; } ?>  ><a href="<?php echo site_url("admin/params/test_mail/"); ?>">Les Paramètres</a></li>
			</ul>
		</div>
	</div>
</div>