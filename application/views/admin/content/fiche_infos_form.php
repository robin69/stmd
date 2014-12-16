
<div class="main pagesize"> <!-- *** mainpage layout *** -->
	<div class="main-wrap">
		<div class="page clear">
			<h1><?php echo $title; ?></h1>
			<p>Sous-menu : <a class="button blue" href="<?php echo site_url("admin/inscrits"); ?>/liste">Liste</a> | <a class="button green" href="<?php echo site_url("admin/inscrits"); ?>/add">Ajouter</a> | <a class="button red" href="<?php echo site_url("admin/inscrits"); ?>/import">Importer</a></p>
			
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
									"id"	=>	"infos_form"
									);
								if($form == "modif")
								{
									$hidden = array("id_fiche" => $fiche->id_fiche() );
									echo form_open("admin/inscrits/edit_fiche_infos/".$fiche->id_fiche(), $attr, $hidden);	
								}else{
									echo form_open("admin/inscrits/add", $attr);
								}
								
							
							
								//Champ Nom
								$args_label = array(
								    'class' => 'form-label size-200 fl-space2'
								);
	
								if(isset($fiche) && $fiche->nom_contact() != ""){ $value = $fiche->nom_contact(); }else{ $value = set_value('nom_contact'); }
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
								if(isset($fiche) && $fiche->prenom_contact() != ""){ $value = $fiche->prenom_contact() ; }else{ $value = set_value('prenom_contact'); }
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
								if(isset($fiche) && $fiche->email_contact() != ""){ $value = $fiche->email_contact() ; }else{ $value = set_value('email_contact'); }
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
								if(isset($fiche) && $fiche->tel_contact() != ""){ $value = $fiche->tel_contact() ; }else{ $value = set_value('tel_contact'); }
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
							if(isset($fiche) && $fiche->raison_sociale() != ""){ $value = $fiche->raison_sociale() ; }else{ $value = set_value('raison_sociale'); }
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
							if(isset($fiche) && $fiche->adr1() != ""){ $value = $fiche->adr1() ; }else{ $value = set_value('adr1'); }
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
							if(isset($fiche) && $fiche->adr2() != ""){ $value = $fiche->adr2() ; }else{ $value = set_value('adr2'); }
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
							if(isset($fiche) && $fiche->ville() != ""){ $value = $fiche->ville() ; }else{ $value = set_value('ville'); }
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
							if(isset($fiche) && $fiche->cp() != ""){ $value = $fiche->cp() ; }else{ $value = set_value('cp'); }
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
							if(isset($fiche) && $fiche->email_societe() != ""){ $value = $fiche->email_societe() ; }else{ $value = set_value('email_societe'); }
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
							if(isset($fiche) && $fiche->tel_societe() != ""){ $value = $fiche->tel_societe() ; }else{ $value = set_value('tel_societe'); }
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
							if(isset($fiche) && $fiche->fax() != ""){ $value = $fiche->fax() ; }else{ $value = set_value('fax'); }
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
							if(isset($fiche) && $fiche->site() != ""){ $value = $fiche->site() ; }else{ $value = set_value('site'); }
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
					<?php
				form_close()
			?>

			
						
				<?php 
				//Chargement de la sidebar; 
				$sidebar_datas = array(
					"sub_menu_actif"		=>	"fiche_infos_form",
					"form_name"				=>	"infos_form",
					"id_fiche"				=>	$fiche->id_fiche(),
                    "fiche"                 =>  $fiche
				);
				$this->layout->view("_fiche_sub_menu", $sidebar_datas); 
				?>
				
							
			</div>
		</div><!-- END OF BOX-WRAP -->
	</div>
</div>



<!-- ---------------------------------------------------------- OLD PAGE ----------------------------------------------------->
			