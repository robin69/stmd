<div class="main pagesize"> <!-- *** mainpage layout *** -->
	<div class="main-wrap">
		<div class="page clear">
		
			<h1><?php echo $page_title; ?></h1>
			<p>Menu utilisateur : <a class="button blue" href="<?php echo site_url("admin/utilisateurs"); ?>/liste">Liste</a> | <a class="button green" href="<?php echo site_url("admin/utilisateurs"); ?>/add">Ajouter</a> </p>
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
							//Préparation/gestion de la pagination
							
								

							if($users<=0)
							{
								?>
								<div class="notification note-error">
									<a class="close" title="Close notification" href="#">close</a>
									<p><strong>ATTENTION :</strong> Il n'y a pas d'utilisateur avec ce status</p>
								</div>
								<?php
							}else{
								
								?>
								<p>Voici des utilisateurs de l'annuaire. Cette liste peut être filtrée au besoin.</p> 
								<?php echo $this->pagination->create_links(); ?>
								
								<table class="style1 ">
								<thead>
									<tr>
										<th>Id</th>
										<th>Identité</th>
										<th>Email</th>
										<th>Tel</th>
										<th>Status du compte</th>
										<th>Dernière connexion</th>
										<th>OUTILS</th>
									</tr>
								</thead>
								
								<?php
									foreach($users as $u)
									{
										
										?>
										<tbody>
											<tr>
												<td><a href="<?php echo site_url("admin/utilisateurs"); ?>/edit/<?php echo $u->id_user(); ?>"><?php echo $u->id_user(); ?></a></td>
												<td><a href="<?php echo site_url("admin/utilisateurs"); ?>/edit/<?php echo $u->id_user(); ?>"><?php echo $u->prenom(); ?> <?php echo $u->nom(); ?></a></td>
												<td><?php echo $u->email(); ?></td>
												<td><?php echo $u->tel(); ?></td>
												<td><?php

													switch($u->compte_status())
													{
														case "active"	:
															$led	=	'<img class="block" alt="'.$u->compte_status().'" title="'.$u->compte_status().'" src="'.site_url("assets/admin").'/images/ball_green_16.png">';
															break;
														/*
case "wait"	:
															$led	=	'<img class="block" alt="" src="'.site_url("assets/admin").'/images/ball_yellow_16.png">';
															break;
*/
														default	:
															$led	=	'<img class="block" alt="'.$u->compte_status().'" title="'.$u->compte_status().'" src="'.site_url("assets/admin").'/images/ball_red_16.png">';
															break;
															
													}
													echo $led;

													?></td>
												<td><?php 
												
													if($u->lastcnx() > 0)
													{
														echo date("d/m/Y h:i",$u->lastcnx());
													}else{
														echo "Jamais";
													} ?></td>
												<td>
													<a href="<?php echo site_url("admin/utilisateurs"); ?>/edit/<?php echo $u->id_user(); ?>"><img src="<?php echo site_url("assets/admin"); ?>/images/ico_edit_16.png" class="icon16 fl-space2" alt="" title="edit" /></a>
													<a href="<?php echo site_url("admin/utilisateurs"); ?>/delete/<?php echo $u->id_user(); ?>"><img src="<?php echo site_url("assets/admin"); ?>/images/ico_delete_16.png" class="icon16 fl-space2" alt="" title="delete" /></a>
													<a href="<?php echo site_url("admin/utilisateurs"); ?>/settings/<?php echo $u->id_user(); ?>"><img src="<?php echo site_url("assets/admin"); ?>/images/ico_settings_16.png" class="icon16 fl-space2" alt="" title="settings" /></a>
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
			
			