<div class="main pagesize"> <!-- *** mainpage layout *** -->
	<div class="main-wrap">
		<div class="page clear">
		
			<h1><?php echo $page_title; ?></h1>
			<p>Menu catégorie : <a class="button blue" href="<?php echo site_url("admin/categories"); ?>/liste/status/tous">Liste</a> | <a class="button green" href="<?php echo site_url("admin/categories"); ?>/add">Ajouter</a> </p>
			<div class="columns clear"></div>
							
			
			<!-- CONTENT BOX - DATATABLE -->
			<div class="content-box">
			<div class="box-body">
				<div class="box-header clear">
										
					<h2><?php echo $sub_title; ?></h2>
				</div>
				
				<div class="box-wrap clear">
					<div class="sidebar1-4 clear">
						<div class="sidebar">
							
							<div class="sidemenu">
								<h3>TRIER la liste.</h3>
								<h4>Par status</h4>
								<ul class="list">
									<li><a href="<?php echo site_url("admin/utilisateurs"); ?>/liste/" >Tous</a></li>
									<li><a href="<?php echo site_url("admin/utilisateurs"); ?>/liste/filter_name/compte_status/filter_value/active">Activés</a></li>
									<li><a href="<?php echo site_url("admin/utilisateurs"); ?>/liste/filter_name/compte_status/filter_value/non-active">Non activés</a></li>
								</ul>
								
								<div class="rule"></div>
								
								<?php
									if(isset($categories_principales)){
								?>
								<h4>Par Catégorie principale</h4>
								<ul class="list">
									<li><a href="<?php echo site_url("admin/inscrits"); ?>/liste" >Toutes</a></li>
									
									<?php
										foreach($categories_principales as $cat){
											?>
											<li><a href="<?php echo site_url("admin/inscrits"); ?>/liste/filter_name/category_id/filter_value/<?php echo $cat->id_category() ; ?>" ><?php echo $cat->public_name() ; ?></a></li>
											<?php
										}
									?>
																	</ul>
								
								<div class="rule"></div>
								<?php } ?>
								

							</div>
						</div><!-- end of Sidebar -->
					<div class="col3-4">

					
					<!-- DATA-TABLE JS PLUGIN -->
					<div id="data-table">
						<?php
							//Préparation/gestion de la pagination
							
								
							
							if($categories<=0)
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
										<th>Nom</th>
										<th>Type(s)</th>
										<th>OUTILS</th>
									</tr>
								</thead>
								
								<?php
									
									foreach($categories as $categorie)
									{
										
										$types = new Type;
										$type_liste = $types->get_cat_types($categorie->id_category() ,TRUE);

										?>
										<tbody>
											<tr>
												<td><a href="<?php echo site_url("admin/categories"); ?>/edit/<?php echo $categorie->id_category() ; ?>"><?php echo $categorie->id_category() ; ?></a></td>
												<td><a href="<?php echo site_url("admin/categories"); ?>/edit/<?php echo $categorie->id_category() ; ?>"><?php echo $categorie->public_name(); ?></a></td>
												<td><?php echo $type_liste; ?></td>
												<td>
													<a href="<?php echo site_url("admin/categories"); ?>/edit/<?php echo $categorie->id_category() ; ?>"><img src="<?php echo site_url("assets/admin"); ?>/images/ico_edit_16.png" class="icon16 fl-space2" alt="" title="edit" /></a>
													<a href="<?php echo site_url("admin/categories"); ?>/delete/<?php echo $categorie->id_category() ; ?>"><img src="<?php echo site_url("assets/admin"); ?>/images/ico_delete_16.png" class="icon16 fl-space2" alt="" title="delete" /></a>
													<a href="<?php echo site_url("admin/categories"); ?>/settings/<?php echo $categorie->id_category() ; ?>"><img src="<?php echo site_url("assets/admin"); ?>/images/ico_settings_16.png" class="icon16 fl-space2" alt="" title="settings" /></a>
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
			
			