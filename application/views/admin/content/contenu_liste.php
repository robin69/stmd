<div class="main pagesize"> <!-- *** mainpage layout *** -->
	<div class="main-wrap">
		<div class="page clear">
		
			<h1><?php echo $page_title; ?></h1>
			<p>Menu contenus : <a class="button blue" href="<?php echo site_url("admin/contenus"); ?>/liste/status/tous">Liste</a> | <a class="button green" href="<?php echo site_url("admin/contenus"); ?>/add">Ajouter</a> </p>
			<div class="columns clear"></div>
							
			
			<!-- CONTENT BOX - DATATABLE -->
			<div class="content-box">
			<div class="box-body">
				<div class="box-header clear">
					<ul class="tabs clear">
						<li><a href="<?php echo site_url("admin/contenus"); ?>/liste/status/tous">Tous</a></li>
						<li><a href="<?php echo site_url("admin/contenus"); ?>/liste/status/active">Activés</a></li>
						<li><a href="<?php echo site_url("admin/contenus"); ?>/liste/status/non-active">Non activés</a></li>
					</ul>
					
					<h2><?php echo $sub_title; ?></h2>
				</div>
				
				<div class="box-wrap clear">
					
					<!-- DATA-TABLE JS PLUGIN -->
					<div id="data-table">
						<?php
							//Préparation/gestion de la pagination
							
								
							
							if($contenus<=0)
							{
								?>
								<div class="notification note-error">
									<a class="close" title="Close notification" href="#">close</a>
									<p><strong>ATTENTION :</strong> Il n'y a pas de catégorie avec ce status</p>
								</div>
								<?php
							}else{
								
								?>
								<p>Voici la liste des catégories de l'annuaire. Cette liste peut être filtrée au besoin.</p> 
								<?php echo $this->pagination->create_links(); ?>
								
								<table class="style1 ">
								<thead>
									<tr>
										<th>Id</th>
										<th>Titre</th>
										<th>Type</th>
										<th>Status</th>
										<th>OUTILS</th>
									</tr>
								</thead>
								
								<?php
									foreach($contenus as $contenu)
									{
										?>
										<tbody>
											<tr>
												<td><a href="<?php echo site_url("admin/contenus"); ?>/edit/<?php echo $contenu->id_contenu; ?>"><?php echo $contenu->id_contenu; ?></a></td>
												<td><a href="<?php echo site_url("admin/contenus"); ?>/edit/<?php echo $contenu->id_contenu; ?>"><?php echo $contenu->title; ?></a></td>
												<td><?php echo $contenu->content_type; ?></td>
												<td>/<?php echo $contenu->publications_status; ?></td>
												<td>
													<a href="<?php echo site_url("admin/contenus"); ?>/edit/<?php echo $contenu->id_contenu; ?>"><img src="<?php echo site_url("assets/admin"); ?>/images/ico_edit_16.png" class="icon16 fl-space2" alt="" title="edit" /></a>
													<a href="<?php echo site_url("admin/contenus"); ?>/delete/<?php echo $contenu->id_contenu; ?>"><img src="<?php echo site_url("assets/admin"); ?>/images/ico_delete_16.png" class="icon16 fl-space2" alt="" title="delete" /></a>
													<a href="<?php echo site_url("admin/contenus"); ?>/settings/<?php echo $contenu->id_contenu; ?>"><img src="<?php echo site_url("assets/admin"); ?>/images/ico_settings_16.png" class="icon16 fl-space2" alt="" title="settings" /></a>
												</td>
											</tr>
										</tbody>
										<?php
									}
								?>
								
								</table>
								<?php echo $this->pagination->create_links(); ?>
																<?php
							}	//END OF IF count inscrits >=0
							?>
					
						</form>
					</div><!-- /#table -->
								
					
				</div><!-- end of box-wrap -->
			</div> <!-- end of box-body -->
			</div> <!-- end of content-box -->
			</div></div></div></div>
			
			