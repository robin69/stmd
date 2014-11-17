
<div class="main pagesize"> <!-- *** mainpage layout *** -->
	<div class="main-wrap">
		<div class="page clear">
			<h1><?php echo $title; ?></h1>
			<p>Sous-menu : <a class="button blue" href="<?php echo site_url("admin/inscrits"); ?>/liste/status/tous">Liste</a> | <a class="button green" href="<?php echo site_url("admin/inscrits"); ?>/add">Ajouter</a> | <a class="button red" href="<?php echo site_url("admin/inscrits"); ?>/import">Importer</a></p>
			
			<div class="column clear">
			
				<div class="col2-3">
					<div class="content-box">
						<div class="box-body">
							<div class="box-header clear">
								<h2>Type</h2>
							</div>
							<?php
								//Affichage du message d'erreur / succès du formaulaire après envois
								if(isset($notification_note))
								{
									?>
									<div class="notification note-<?php echo $notification_note["type"]; ?>">
										<a class="close" title="Close notification" href="#">close</a>
										<p>
										<?php echo $notification_note["msg"]; ?>.
										</p>
									</div>
									<?php
								}
							?>
				
							<div class="box-wrap clear">
								<?php
						
									//Ouverture du formulaire 
								
									$attr = array(
										"class"	=>	"validate-form form bt-space15",
										"id"	=>	"cats_form"
										);
									$hidden = array("id_fiche" => $fiche->id_fiche() );
									echo form_open("admin/inscrits/edit_fiche_cat/".$fiche->id_fiche(), $attr, $hidden);
								?>
								
								
								
								<div class="form-field bt-space10">
									<div class="clear">
										
										<?php
											foreach($types as $type)
											{
												
												?>
												<div class="form-checkbox-item clear fl-space2">
													<input id="<?php echo $type->slug; ?>" class="checkbox fl-space" type="checkbox" name="type[<?php echo $type->slug; ?>]" rel="checkboxhorizont">
													<label class="fl" for="<?php echo $type->slug; ?>"><?php echo $type->public_name; ?></label>	
												</div>
												<?php
											}
										
										?>
									</div>
								</div>
							</div>
						</div>
					</div><!-- END OF CONTENT BOX -->
					
					<div class="content-box">
						<div class="box-body">
							<div class="box-header box-slide-head clear">
								<span class="slide-but">open/close</span>

								<h2>Catégories</h2>
							</div>
							<div class="box-wrap box-slide-body hidden">
								<?php
								
								foreach($domaines as $dom)
								{
									$dom_checked = (in_array($dom->id_category ,$fiche->categories())) ? " checked='CHECKED' " : "";
									
									?>
									
										<div class="form-field clear">
											<h4>
												<input id="<?php echo $dom->slug; ?>" class="checkbox fl-space" type="checkbox" name="categories[]" rel="checkboxhorizont" value="<?php echo $dom->id_category; ?>" <?php echo $dom_checked; ?> >
												<label class="fl" for="<?php echo $dom->slug; ?>"><?php echo $dom->public_name; ?></label>
											</h4>
											<div class="rule2"></div>
											<ul>
											<?php
											$category = new Category;
											$cats = $category->get_child($dom->id_category);
											foreach($cats as $cat)
											{
												$cat_checked = (in_array($cat->id_category,$fiche_cats)) ? " checked='CHECKED' " : "";
												?>
												
													<li>
														<input id="<?php echo $cat->slug; ?>" class="checkbox" type="checkbox" name="categories[]" rel="checkboxvert" value="<?php echo $cat->id_category; ?>" <?php echo $cat_checked; ?> ><label class="" for="<?php echo $cat->slug; ?>"><?php echo $cat->public_name; ?></label>
													</li>
											
													
													
												<?php
											}
											?>
											</ul>
											<br /><br /><br />
										</div>
									
																				<?php
								}
								?>
							</div>
						</div>
					</div>
					
					
					
					<div class="content-box">
						<div class="box-body">
							<div class="box-header box-slide-head clear">
								<span class="slide-but">open/close</span>

								<h2>Définition de conseiller</h2>
							</div>
							<div class="box-wrap box-slide-body clear">
								<p>Ici la définition d'un conseiller</p>
							</div>
						</div>
					</div>
				</div><!-- END OF COL2-3 -->
					<?php
				form_close()
			?>

			
						
				<?php 
				//Chargement de la sidebar; 
				$sidebar_datas = array(
					"sub_menu_actif"		=>	"fiche_cats_form",
					"form_name"				=>	"cats_form",
					"id_fiche"				=>	$fiche->id_fiche()
				);
				$this->layout->view("_fiche_sub_menu", $sidebar_datas); 
				?>
				
							
			</div>
		</div><!-- END OF BOX-WRAP -->
	</div>
</div>



<!-- ---------------------------------------------------------- OLD PAGE ----------------------------------------------------->
			