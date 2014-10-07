
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
								<h2>Informations générales</h2>
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
							
								<h3>Le contact</h3>
						<div class="rule"></div>
								<?php
						
								//Ouverture du formulaire 
								
								$attr = array(
									"class"	=>	"validate-form form bt-space15",
									"id"	=>	"desc_form"
									);
								if($form == "modif")
								{
									$hidden = array("id_fiche" => $fiche->id_fiche );
									echo form_open("admin/inscrits/edit_submit", $attr, $hidden);	
								}else{
									echo form_open("admin/inscrits/add_submit", $attr);
								}
								
							
							
								//Champ Nom
								$args_label = array(
								    'class' => 'form-label size-200 fl-space2'
								);
	
								if(isset($fiche) && $fiche->nom_contact != ""){ $value = $fiche->nom_contact; }else{ $value = set_value('nom_contact'); }
								$args_input = array(
									"name"	=>	"nom_contact",
									"id"	=>	"nom_contact",
									"value"	=>	$value,
									"class"	=> "required text fl-space2 size-200"
								);
								?>
								<div class="form-field clear">
								<?php
								echo form_label('Nom : ', 'nom_contact', $args_label);
								echo form_input($args_input);
								echo form_error('nom_contact');
								?></div>
								
						
							<?php
								//Champ Prénom
								if(isset($fiche) && $fiche->prenom_contact != ""){ $value = $fiche->prenom_contact; }else{ $value = set_value('prenom_contact'); }
								$args_label = array(
								    'class' => 'form-label size-200 fl-space2 '
								);
								
								$args_input = array(
									"name"	=>	"prenom_contact",
									"id"	=>	"prenom_contact",
									"value"	=>	$value,
									"class"	=> "required text fl-space2 size-200"
								);
								?>
								<div class="form-field clear">
								<?php
								echo form_label('Prénom : ', 'prenom_contact', $args_label);
								echo form_input($args_input);
								echo form_error('prenom_contact');
								?></div>
								
							<?php
								//Champ Email
								if(isset($fiche) && $fiche->email_contact != ""){ $value = $fiche->email_contact; }else{ $value = set_value('email_contact'); }
								$args_label = array(
								    'class' => 'form-label size-200 fl-space2'
								);
								
								$args_input = array(
									"name"	=>	"email_contact",
									"id"	=>	"email_contact",
									"value"	=>	$value,
									"class"	=> "required text fl-space2 size-200"
								);
								?>
								<div class="form-field clear">
								<?php
								echo form_label('Email Contact : ', 'email_contact', $args_label);
								echo form_input($args_input);
								echo form_error('email_contact');
								?></div>
								
							
								<?php
								//Champ Tél
								if(isset($fiche) && $fiche->tel_contact != ""){ $value = $fiche->tel_contact; }else{ $value = set_value('tel_contact'); }
								$args_label = array(
								    'class' => 'form-label size-200 fl-space2'
								);
								
								$args_input = array(
									"name"	=>	"tel_contact",
									"id"	=>	"tel_contact",
									"value"	=>	$value,
									"class"	=> "required text fl-space2 size-200"
								);
								?>
								<div class="form-field clear">
								<?php
								echo form_label('Téléphone : ', 'tel_contact', $args_label);
								echo form_input($args_input);
								echo form_error('tel_contact');
								?></div>
								
															
							
								<br /><br /><br />

								
					<h3>La société</h3>
						<div class="rule"></div>

						<?php
							//Champ Raison Sociale
							if(isset($fiche) && $fiche->raison_sociale != ""){ $value = $fiche->raison_sociale; }else{ $value = set_value('raison_sociale'); }
							$args_label = array(
							    'class' => 'form-label size-200 fl-space2'
							);
							
							$args_input = array(
								"name"	=>	"raison_sociale",
								"id"	=>	"raison_sociale",
								"value"	=>	$value,
								"class"	=> "text fl-space2 size-200"
							);
							?>
							<div class="form-field clear">
							<?php
							echo form_label('Raison Sociale : ', 'raison_sociale', $args_label);
							echo form_input($args_input);
							echo form_error('raison_sociale');
							?></div>



						
							
							
						<?php
							//Champ Adresse 1
							if(isset($fiche) && $fiche->adr1 != ""){ $value = $fiche->adr1; }else{ $value = set_value('adr1'); }
							$args_label = array(
							    'class' => 'form-label size-200 fl-space2'
							);
							
							$args_input = array(
								"name"	=>	"adr1",
								"id"	=>	"adr1",
								"value"	=>	$value,
								"class"	=> "text fl-space2 size-200"
							);
							?>
							<div class="form-field clear">
							<?php
							echo form_label('Adresse 1 : ', 'adr1', $args_label);
							echo form_input($args_input);
							echo form_error('adr1');
							?></div>
							
						<?php
							//Champ Adresse 2
							if(isset($fiche) && $fiche->adr2 != ""){ $value = $fiche->adr2; }else{ $value = set_value('adr2'); }
							$args_label = array(
							    'class' => 'form-label size-200 fl-space2'
							);
							
							$args_input = array(
								"name"	=>	"adr2",
								"id"	=>	"adr2",
								"value"	=>	$value,
								"class"	=> "text fl-space2 size-200"
							);
							?>
							<div class="form-field clear">
							<?php
							echo form_label('Adresse 2 : ', 'adr2', $args_label);
							echo form_input($args_input);
							echo form_error('adr2');
							?></div>
							
							
							<?php
							//Champ VIllE
							if(isset($fiche) && $fiche->ville != ""){ $value = $fiche->ville; }else{ $value = set_value('ville'); }
							$args_label = array(
							    'class' => 'form-label size-200 fl-space2'
							);
							
							$args_input = array(
								"name"	=>	"ville",
								"id"	=>	"ville",
								"value"	=>	$value,
								"class"	=> "text fl-space2 size-200"
							);
							?>
							<div class="form-field clear">
							<?php
							echo form_label('Ville : ', 'ville', $args_label);
							echo form_input($args_input);
							echo form_error('Ville');
							?></div>
							
						<?php
							//Champ CP
							if(isset($fiche) && $fiche->cp != ""){ $value = $fiche->cp; }else{ $value = set_value('cp'); }
							$args_label = array(
							    'class' => 'form-label size-200 fl-space2'
							);
							
							$args_input = array(
								"name"	=>	"cp",
								"id"	=>	"cp",
								"value"	=>	$value,
								"class"	=> "text fl-space2 size-200"
							);
							?>
							<div class="form-field clear">
							<?php
							echo form_label('Code postal : ', 'cp', $args_label);
							echo form_input($args_input);
							echo form_error('cp');
							?></div>

						
						<?php
							//Champ Email public
							if(isset($fiche) && $fiche->email_societe != ""){ $value = $fiche->email_societe; }else{ $value = set_value('email_societe'); }
							$args_label = array(
							    'class' => 'form-label size-200 fl-space2'
							);
							
							$args_input = array(
								"name"	=>	"email_societe",
								"id"	=>	"email_societe",
								"value"	=>	$value,
								"class"	=> "text fl-space2 size-200"
							);
							?>
							<div class="form-field clear">
							<?php
							echo form_label('Email (public) : ', 'email_societe', $args_label);
							echo form_input($args_input);
							echo form_error('email_societe');
							?></div>
							
							
						<?php
							//Champ Téléphone
							if(isset($fiche) && $fiche->tel_societe != ""){ $value = $fiche->tel_societe; }else{ $value = set_value('tel_societe'); }
							$args_label = array(
							    'class' => 'form-label size-200 fl-space2'
							);
							
							$args_input = array(
								"name"	=>	"tel_societe",
								"id"	=>	"tel_societe",
								"value"	=>	$value,
								"class"	=> "text fl-space2 size-200"
							);
							?>
							<div class="form-field clear">
							<?php
							echo form_label('Téléphone (public) : ', 'tel_societe', $args_label);
							echo form_input($args_input);
							echo form_error('tel_societe');
							?></div>
							
						<?php
							//Champ Fax
							if(isset($fiche) && $fiche->fax != ""){ $value = $fiche->fax; }else{ $value = set_value('fax'); }
							$args_label = array(
							    'class' => 'form-label size-200 fl-space2'
							);
							
							$args_input = array(
								"name"	=>	"fax",
								"id"	=>	"fax",
								"value"	=>	$value,
								"class"	=> "text fl-space2 size-200"
							);
							?>
							<div class="form-field clear">
							<?php
							echo form_label('Fax : ', 'fax', $args_label);
							echo form_input($args_input);
							echo form_error('fax');
							?></div>
							
						<?php
							//Champ Site
							if(isset($fiche) && $fiche->site != ""){ $value = $fiche->site; }else{ $value = set_value('site'); }
							$args_label = array(
							    'class' => 'form-label size-200 fl-space2'
							);
							
							$args_input = array(
								"name"	=>	"site",
								"id"	=>	"site",
								"value"	=>	$value,
								"class"	=> "text fl-space2 size-200"
							);
							?>
							<div class="form-field clear">
							<?php
							echo form_label('Site internet : ', 'site', $args_label);
							echo form_input($args_input);
							echo form_error('site');
							?></div>
								
							</div>
						</div>
					</div>
				</div>
					

				
				<div class="col1-3 lastcol">
					<div class="content-box bt-space10">
						<div class="box-body">
							<div class="box-header box-slide-head">
								<span class="slide-but">open/close</span>
								<h2>OUTILS</h2>
							</div>
							
							<div class="box-wrap clear box-slide-body">
								<div class="sidebar">
									
									<div class="sidemenu">										
										<ul class="list">
											<li>
												<a href="#" onclick="document.forms['desc_form'].submit();">Mettre à jour</a>
											</li>
											<li>
												<a href="#" >Publier</a>
											</li>
										
										</ul>
										
										<div class="rule"></div>
										
										<h4>Infos</h4>
										<div class="mark_blue bt-space20">
											<ul class="standard clean-padding bt-space20">
												<li class="bt-space5"><strong>Clics total : </strong></li>
												<li class="bt-space5"><strong>Clics 30j : </strong></li>
												<li class="bt-space5"><strong>Eval : </strong></li>
												<li class="bt-space5"><strong>nbr d'éval : </strong></li>
											</ul>
										</div>
										
										<div class="rule"></div>
										
										<h4>Informations relatives</h4>
										<div class="mark_blue bt-space20">

											<ul class="list">
												<li class="active">
													<a href="#" >Infos générales</a>
												</li>
												<li>
													<a href="#">Catégories</a>
												</li>
												<li>
													<a href="#">Descriptifs</a>
												</li>
												<li>
													<a href="#">Liens sociaux</a>
												</li>
											</ul>
										</div>
										
										<div class="rule"></div>
										
										
										<div class="mark_blue bt-space20">
											<h4>INFORMATIONS IMPORTANTES :</h4>
			
											<ul class="standard clean-padding bt-space20">
												<li class="bt-space5">L'email renseigné pour le contact sera utilisé par le système pour les mails transactionnels, mais ne sera pas publié dans les pages de l'annuaire.</li>
												<li class="bt-space5">L'administrateur ne voit pas le mot de passe, mais il peut le réinitialiser. Si vous souhaitez communiquer un nouveau mot de passe à votre contact... notez-le !</li>
											</ul>
										</div>
										
											<div class="rule"></div>
									</div>
								</div><!-- end of Sidebar -->
							</div>
						</div>
					</div>
				</div> <!-- cal1-3 lastcol -->
							
			</div>
		</div><!-- END OF BOX-WRAP -->
	</div>
</div>



<!-- ---------------------------------------------------------- OLD PAGE ----------------------------------------------------->
			<div class="content-box">					
							

							
							<h2>Blah blah blah...</h2>
							<div class="rule"></div>
							<div class="columns clear bt-space15">
								<div class="col1-2">

									<h3>Description de la société</h3>
									<?php
									if(isset($fiche) && $fiche->description != ""){ $value = $fiche->description; }else{ $value = set_value('description'); }
									$args_area = array(
										"class"	=>	"jwysiwyg",
										"name"	=>	"description",
										"id"	=>	"description",
										"value"	=>	$value,
										
									);
									echo form_textarea($args_area);
									echo form_error('description');
									?>
									
									<h3>Compétences</h3>
									<?php
									if(isset($fiche) && $fiche->competences != ""){ $value = $fiche->competences; }else{ $value = set_value('competences'); }
									$args_area = array(
										"class"	=>	"jwysiwyg",
										"name"	=>	"competences",
										"id"	=>	"competences",
										"value"	=>	$value,
										
									);
									echo form_textarea($args_area);
									echo form_error('competences');
									?>
								</div>
								<div class="col1-2 lastcol">
								
									<h3>Certifications</h3>
									<?php
									if(isset($fiche) && $fiche->certifications != ""){ $value = $fiche->certifications; }else{ $value = set_value('certifications'); }
									$args_area = array(
										"class"	=>	"jwysiwyg",
										"name"	=>	"certifications",
										"id"	=>	"certifications",
										"value"	=>	$value,
										
									);
									echo form_textarea($args_area);
									echo form_error('certifications');
									?>
	
									<h3>Références</h3>
									<?php
									if(isset($fiche) && $fiche->references != ""){ $value = $fiche->references; }else{ $value = set_value('references'); }
									$args_area = array(
										"class"	=>	"jwysiwyg",
										"name"	=>	"references",
										"id"	=>	"references",
										"value"	=>	$value,
										
									);
									echo form_textarea($args_area);
									echo form_error('references');
									?>
								</div>
								<?php
							//SUBMIT
							
							$args_submit = array(
								"name"	=>	"submit",
								"id"	=>	"submit",
								"value"	=>	"Enregistrer",
								"class"	=> "button size-200 fl"
							);
							?>
							<div class="form-field clear">
							<?php
							echo form_submit($args_submit);
							
							?></div>
							</div>
						</div>
				</div>
			</div>
			
			
			<div class="content-box">
				<div class="box-body">
					<div class="box-header clear">
						<h2>Type de fiche</h2>
					</div>
					
					<div class="box-wrap clear">
						<div class="columns clear bt-space15">	
	
								<div class="form-field bt-space10">
									<div class="clear">
										<h4 class="fl-space2 ln-22 size-170">
											Model de fiche
										</h4>
										
										<div class="form-checkbox-item clear fl-space2">
											<input id="prestataire" class="checkbox fl-space" type="checkbox" name="type[prestataire]" rel="checkboxhorizont">
											<label class="fl" for="prestataire">Prestataire</label>	
										</div>
										<div class="form-checkbox-item clear fl-space2">
											<input id="conseiller" class="checkbox fl-space" type="checkbox" name="form[conseiller]" rel="checkboxhorizont">
											<label class="fl" for="conseiller">Conseiller</label>	
										</div>
									
									
									
									</div>
									
									
								</div>
								<span id="error-checkboxhorizont"></span>
						</div>
							
							
								
						<?php
						//SUBMIT
						
						$args_submit = array(
							"name"	=>	"submit",
							"id"	=>	"submit",
							"value"	=>	"Enregistrer",
							"class"	=> "button size-200 fl"
						);
						?>
						<div class="form-field clear">
						<?php
						echo form_submit($args_submit);
						
						?>
						</div>
					</div>
				</div>
			</div>
			
			
			<div class="content-box">
				<div class="box-body">
					<div class="box-header clear">
						<h2>Prestataire</h2>
					</div>
					<div class="box-wrap clear">
						<div class="columns clear bt-space15">	
	
								<div class="form-field bt-space10">
									<div class="clear">
										<?php
											foreach($domaines as $dom)
											{
												$dom_checked = (in_array($dom->id_category,$fiche_cats)) ? " checked='CHECKED' " : "";
												
												?>
												
													<div class="form-field clear">
														<h4>
															<input id="<?php echo $dom->slug; ?>" class="checkbox fl-space" type="checkbox" name="cat[]" rel="checkboxhorizont" value="<?php echo $dom->id_category; ?>" <?php echo $dom_checked; ?> >
															<label class="fl" for="<?php echo $dom->slug; ?>"><?php echo $dom->public_name; ?></label>
														</h4>
														<div class="rule2"></div>
														<ul>
														<?php
														$category = new Category_model;
														$cats = $category->get_cat_child($dom->id_category);
														
														foreach($cats as $cat)
														{
															$cat_checked = (in_array($cat->id_category,$fiche_cats)) ? " checked='CHECKED' " : "";
															?>
															
																<li>
																	<input id="<?php echo $cat->slug; ?>" class="checkbox" type="checkbox" name="cat[]" rel="checkboxvert" value="<?php echo $cat->id_category; ?>" <?php echo $cat_checked; ?> ><label class="" for="<?php echo $cat->slug; ?>"><?php echo $cat->public_name; ?></label>
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
								<span id="error-checkboxhorizont"></span>
						</div>
							
							
								
						<?php
						//SUBMIT
						
						$args_submit = array(
							"name"	=>	"submit",
							"id"	=>	"submit",
							"value"	=>	"Enregistrer",
							"class"	=> "button size-200 fl"
						);
						?>
						<div class="form-field clear">
						<?php
						echo form_submit($args_submit);
						
						?>
						</div>
					</div>
				</div>
			</div>
			
			
			
			
			
			<div class="content-box">
				<div class="box-body">
					<div class="box-header clear">
						<h2>Conseiller</h2>
					</div>
					
					<div class="box-wrap clear">
						<div class="columns clear bt-space15">	
	
								<div class="form-field bt-space10">
									<div class="clear">
										<h4 class="fl-space2 ln-22 size-170">
											Model de fiche
										</h4>
										
										<div class="form-checkbox-item clear fl-space2">
											<input id="prestataire" class="checkbox fl-space required" type="checkbox" name="type[prestataire]" rel="checkboxhorizont">
											<label class="fl" for="prestataire">Prestataire</label>	
										</div>
										<div class="form-checkbox-item clear fl-space2">
											<input id="conseiller" class="checkbox fl-space required" type="checkbox" name="form[conseiller]" rel="checkboxhorizont">
											<label class="fl" for="conseiller">Conseiller</label>	
										</div>
									
									
									
									</div>
									
									
								</div>
								<span id="error-checkboxhorizont"></span>
						</div>
							
							
								
						<?php
						//SUBMIT
						
						$args_submit = array(
							"name"	=>	"submit",
							"id"	=>	"submit",
							"value"	=>	"Enregistrer",
							"class"	=> "button size-200 fl"
						);
						?>
						<div class="form-field clear">
						<?php
						echo form_submit($args_submit);
						
						?>
						</div>
					</div>
				</div>
			</div>

			
			
			
		</div>
		
			
			<?php
				form_close()
			?>
		</div><!-- end of page -->
	</div>
</div>
