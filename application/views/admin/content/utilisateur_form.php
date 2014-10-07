<?php
	if(isset($utilisateur))
	{
		$u = $utilisateur;			
	}

?>
<div class="main pagesize"> <!-- *** mainpage layout *** -->
	<div class="main-wrap">
		<div class="page clear">
			<h1><?php echo $title; ?></h1>
			<p>Menu utilisateur : <a class="button blue" href="<?php echo site_url("admin/utilisateurs"); ?>/liste/status/tous">Liste</a> | <a class="button green" href="<?php echo site_url("admin/utilisateurs"); ?>/add">Ajouter</a> </p>
			
			<div class="column clear">
					<div class="col2-3">
						<div class="content-box">
							<div class="box-body">
								<div class="box-header clear">
									<h2>L'utilisateur</h2>
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

										<div class="notification note-attention">
											<p><strong>Attention : </strong>
												L'adresse email est l'identifiant de l'utilisateur. Si vous changez l'adresse email, l'utilisateur ne pourra plus se connecter sur le site.
											</p>
										</div>
										


										<?php
										
											//Ouverture du formulaire 
											
											$attr = array(
														"class"	=>	"validate-form form bt-space15",
														"id"	=>	"user_form"
													);
											if($form == "modif")
											{

												$hidden = array("id_user" => $u->id_user() );
												echo form_open("admin/utilisateurs/edit/".$u->id_user(), $attr, $hidden);	
											}else{
												echo form_open("admin/utilisateurs/add", $attr);
											}
											
											
											
											//Champ Nom
											$args_label = array(
											    'class' => 'form-label size-200 fl-space2'
											);
					
											if(isset($u) && $u->nom() != ""){ $value = $u->nom() ; }else{ $value = set_value('nom'); }
											$args_input = array(
												"name"	=>	"nom",
												"id"	=>	"nom",
												"value"	=>	$value,
												"class"	=> "required text fl-space2 size-200"
											);
											?>
											<div class="form-field clear">
											<?php
											echo form_label('Nom : ', 'nom', $args_label);
											echo form_input($args_input);
											echo form_error('nom');
											?></div>
											
										
										<?php
											//Champ Prénom
											if(isset($u) && $u->prenom() != ""){ $value = $u->prenom() ; }else{ $value = set_value('prenom'); }
											$args_label = array(
											    'class' => 'form-label size-200 fl-space2 '
											);
											
											$args_input = array(
												"name"	=>	"prenom",
												"id"	=>	"prenom",
												"value"	=>	$value,
												"class"	=> "required text fl-space2 size-200"
											);
											?>
											<div class="form-field clear">
											<?php
											echo form_label('Prénom : ', 'prenom', $args_label);
											echo form_input($args_input);
											echo form_error('prenom');
											?></div>
											
										<?php
											//Champ Email
											if(isset($u) && $u->email() != ""){ $value = $u->email() ; }else{ $value = set_value('email'); }
											$args_label = array(
											    'class' => 'form-label size-200 fl-space2'
											);
											
											$args_input = array(
												"name"	=>	"email",
												"id"	=>	"email",
												"value"	=>	$value,
												"class"	=> "required text fl-space2 size-200"
											);
											?>
											<div class="form-field clear">
											<?php
											echo form_label('Email : ', 'email', $args_label);
											echo form_input($args_input);
											echo form_error('email');
											?></div>
											
											
											<?php
											//Champ Tél
											if(isset($u) && $u->tel() != ""){ $value = $u->tel() ; }else{ $value = set_value('tel'); }
											$args_label = array(
											    'class' => 'form-label size-200 fl-space2'
											);
											
											$args_input = array(
												"name"	=>	"tel",
												"id"	=>	"tel",
												"value"	=>	$value,
												"class"	=> "required text fl-space2 size-200"
											);
											?>
											<div class="form-field clear">
											<?php
											echo form_label('Téléphone : ', 'tel', $args_label);
											echo form_input($args_input);
											echo form_error('tel');
											?></div>
											
											
											<?php
											//Champ Mot de passe
											$args_label = array(
											    'class' => 'form-label size-200 fl-space2'
											);
											
											$args_input = array(
												"name"	=>	"userpass",
												"id"	=>	"userpass",
												"value"	=>	"",
												"class"	=> "text fl-space2 size-200"
											);
											?>
											
											
											<br /><br /><br />
											<h3>Mot de passe</h3>
											<div class="rule"></div>
											<div class="notification note-info">
												<p><strong>Changement de mots de passe : </strong>
													Saisissez un mot de passe et sa confirmation si vous souhaitez changer le mot de passe de l'utilisateur. Si ces champs sont laissés vides, son mots de passe restera inchangé.
												</p>
											</div>
											<div class="form-field clear">
											<?php
											echo form_label('Mot de passe : ', 'userpass', $args_label);
											echo form_input($args_input);
											echo form_error('userpass');
											?></div>
											
											
											
											<?php
											//Champ Confirmation de mot de passe
											$args_label = array(
											    'class' => 'form-label size-200 fl-space2'
											);
											
											$args_input = array(
												"name"	=>	"passconf",
												"id"	=>	"passconf",
												"value"	=>	"",
												"class"	=> "text fl-space2 size-200"
											);
											?>
											<div class="form-field clear">
											<?php
											echo form_label('Confirmation du passe : ', 'passconf', $args_label);
											echo form_input($args_input);
											echo form_error('passconf');
											?></div>
																		
											
								</div><!-- END OF BOX-WRAP -->
							</div>
						</div>
					</div>

			
			


			<?php
				form_close()
			?>
			
			
			<?php 
				//Chargement de la sidebar; 
				$sidebar_datas = array(
					"sub_menu_actif"		=>	"user_form",
					"form_name"				=>	"user_form",
					"id_user"				=>	$u->id_user()
				);
				$this->layout->view("_user_sub_menu", $sidebar_datas); 
				?>
		</div><!-- end of page -->
	</div>
</div>
