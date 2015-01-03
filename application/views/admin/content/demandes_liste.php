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
							
								

							if(count($liste_demandes) <=0)
							{
								?>
								<div class="notification note-error">
									<a class="close" title="Close notification" href="#">close</a>
									<p><strong></strong> Il n'y a pas de demande de changement de forfait pour le moment</p>
								</div>
								<?php
							}else{
								
								?>
								<p>Voici la liste des demandes</p>
								<?php echo $this->pagination->create_links(); ?>
								
								<table class="style1 ">
								<thead>
									<tr>
										<th>Date de demande</th>
										<th>Identité</th>
										<th>Email</th>
										<th>Tel</th>
										<th>Demande</th>
										<th>OUTILS</th>
									</tr>
								</thead>
								
								<?php
									foreach($liste_demandes as $demande)
									{
										
										?>
										<tbody>
											<tr>
                                                <td><?php echo $demande->date_demande; ?></td>
                                                <td><?php echo $demande->prenom." ".$demande->nom; ?></td>
                                                <td><?php echo $demande->email; ?></td>
                                                <td><?php echo $demande->tel; ?></td>
                                                <td><?php echo $demande->libelle." ( ". $demande->tarif . " €) "; ?></td>

												<td>
													<a href="<?php echo site_url(); ?>/accept_demande/<?php echo $demande->id; ?>">Accepter</a><br />
													<a href="<?php echo site_url(); ?>/accept_demande/<?php echo $demande->id; ?>">Refuser</a><br />
													<a href="<?php echo site_url(); ?>/accept_demande/<?php echo $demande->id; ?>">Voir la viche</a><br />
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
			
			