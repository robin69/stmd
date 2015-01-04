<div class="main pagesize"> <!-- *** mainpage layout *** -->
	<div class="main-wrap">
		<div class="page clear">
		
			<h1><?php echo $page_title; ?></h1>
			<p>Menu Fiche : <a class="button blue" href="<?php echo site_url("admin/inscrits"); ?>/liste">Liste</a> | <a class="button green" href="<?php echo site_url("admin/inscrits"); ?>/add">Ajouter</a> | <a class="button red" href="<?php echo site_url("admin/inscrits"); ?>/import">Importer</a></p>
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
									<li><a href="<?php echo site_url("admin/inscrits"); ?>/liste/" >Tous</a></li>
									<li><a href="<?php echo site_url("admin/inscrits"); ?>/liste/filter_name/publication_status/filter_value/published">Publiés</a></li>
									<li><a href="<?php echo site_url("admin/inscrits"); ?>/liste/filter_name/publication_status/filter_value/unpublished">Non publiés</a></li>
                                    <li><a href="<?php echo site_url("admin/inscrits"); ?>/liste/filter_name/temp/filter_value/1">A modérer</a></li>
                                    <li><a href="<?php echo site_url("admin/inscrits"); ?>/liste/filter_name/unpaid">En attente de règlement</a></li>
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
											<li><a href="<?php echo site_url("admin/inscrits"); ?>/liste/filter_name/category_id/filter_value/<?php echo $cat->id_category; ?>" ><?php echo $cat->public_name; ?></a></li>
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
							if(count($fiches)<=0)
							{
								?>
								<div class="notification note-error">
									<a class="close" title="Close notification" href="#">close</a>
									<p><strong>ATTENTION :</strong> Il n'y a pas d'inscrit avec ce status</p>
								</div>
								<?php
							}else{
								
								?>

								<div class="clear"><?php echo $this->pagination->create_links(); ?> </div>
					
								<table class="style1 ">
								<thead>
									<tr>
										<th>id</th>
										<th>Société</th>
										<th>Contact</th>
										<th>Ville</th>
										<th>Catégorie principale</th>
										<th>fiche</th>
										<th>OUTILS</th>
									</tr>
								</thead>
								
								<?php
									foreach($fiches as $fiche)
									{
										$fiche->id_fiche();
										?>
										<tbody>
											<tr>
												<td><a href="<?php echo site_url("admin/inscrits"); ?>/edit_fiche_infos/<?php echo $fiche->id_fiche(); ?>"><?php echo $fiche->id_fiche(); ?></a></td>
												<td><a href="<?php echo site_url("admin/inscrits"); ?>/edit_fiche_infos/<?php echo $fiche->id_fiche(); ?>"><?php echo $fiche->raison_sociale(); ?></a></td>
												<td><a href="<?php echo site_url("admin/utilisateurs"); ?>/edit/<?php echo $fiche->id_fiche(); ?>"><?php echo $fiche->prenom_contact(); ?> <?php echo $fiche->nom_contact(); ?></a></td>
												<td><?php echo $fiche->ville(); ?></td>
												<td></td>

												<td>
												<?php
												$status = $fiche->publication_status();
												switch($fiche->publication_status())
													{
														case "published"	:
															$led	=	'<img class="block" alt="" src="'.site_url("assets/admin").'/images/ball_green_16.png">';
															break;
														case "wait"	:
															$led	=	'<img class="block" alt="" src="'.site_url("assets/admin").'/images/ball_yellow_16.png">';
															break;
														default	:
															$led	=	'<img class="block" alt="" src="'.site_url("assets/admin").'/images/ball_red_16.png">';
															break;
															
													}
													echo $led;
												?>
												</td>
												<td>
													<a href="<?php echo site_url("admin/inscrits"); ?>/edit_fiche_infos/<?php echo $fiche->id_fiche(); ?>"><img src="<?php echo site_url("assets/admin"); ?>/images/ico_edit_16.png" class="icon16 fl-space2" alt="" title="edit" /></a>
													<a href="<?php echo site_url("admin/inscrits"); ?>/settings/<?php echo $fiche->id_fiche(); ?>"><img src="<?php echo site_url("assets/admin"); ?>/images/ico_settings_16.png" class="icon16 fl-space2" alt="" title="settings" /></a>
													<a href="<?php echo site_url("admin/inscrits"); ?>/delete/<?php echo $fiche->id_fiche(); ?>"><img src="<?php echo site_url("assets/admin"); ?>/images/ico_delete_16.png" class="icon16 fl-space2" alt="" title="delete" /></a>
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
								
					</div>
				</div><!-- end of box-wrap -->
			</div> <!-- end of box-body -->
			</div> <!-- end of content-box -->
			</div></div></div></div>
			
			