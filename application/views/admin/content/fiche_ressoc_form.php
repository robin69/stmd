
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
								<h2>La société sur la toile</h2>
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
										"id"	=>	"ressoc_form"
										);
									$hidden = array("id_fiche" => $fiche->id_fiche() );
									echo form_open("admin/inscrits/edit_fiche_ressoc/".$fiche->id_fiche() , $attr, $hidden);
								?>
								
								
								
								<?php
									//Champ Facebook
									if(isset($fiche) && $fiche->facebook() != ""){ $value = $fiche->facebook(); }else{ $value = set_value('facebook'); }
									$args_label = array(
									    'class' => 'form-label fl-space2'
									);
									
									$args_input = array(
										"name"	=>	"facebook",
										"id"	=>	"facebook",
										"value"	=>	$value,
										"class"	=> "text fl-space2",
										"size"	=>	110
									);
									?>
									<div class="form-field clear">
									<?php
									echo form_label('Facebook : ', 'facebook', $args_label);
									echo form_input($args_input);
									echo form_error('facebook');
									?></div>
									
								<?php
									//Champ googleplus
									if(isset($fiche) && $fiche->googleplus() != ""){ $value = $fiche->googleplus() ; }else{ $value = set_value('googleplus'); }
									$args_label = array(
									    'class' => 'form-label fl-space2'
									);
									
									$args_input = array(
										"name"	=>	"googleplus",
										"id"	=>	"googleplus",
										"value"	=>	$value,
										"class"	=> "text fl-space2",
										"size"	=>	110
									);
									?>
									<div class="form-field clear">
									<?php
									echo form_label('Google+ : ', 'googleplus', $args_label);
									echo form_input($args_input);
									echo form_error('googleplus');
									?></div>
								
							<?php
									//Champ twitter
									if(isset($fiche) && $fiche->twitter() != ""){ $value = $fiche->twitter() ; }else{ $value = set_value('twitter'); }
									$args_label = array(
									    'class' => 'form-label fl-space2'
									);
									
									$args_input = array(
										"name"	=>	"twitter",
										"id"	=>	"twitter",
										"value"	=>	$value,
										"class"	=> "text fl-space2",
										"size"	=>	110
									);
									?>
									<div class="form-field clear">
									<?php
									echo form_label('Twitter : ', 'twitter', $args_label);
									echo form_input($args_input);
									echo form_error('twitter');
									?></div>
									
								<?php
									//Champ viadeo
									if(isset($fiche) && $fiche->viadeo() != ""){ $value = $fiche->viadeo() ; }else{ $value = set_value('viadeo'); }
									$args_label = array(
									    'class' => 'form-label fl-space2'
									);
									
									$args_input = array(
										"name"	=>	"viadeo",
										"id"	=>	"viadeo",
										"value"	=>	$value,
										"class"	=> "text fl-space2",
										"size"	=>	110
									);
									?>
									<div class="form-field clear">
									<?php
									echo form_label('Viadeo : ', 'viadeo', $args_label);
									echo form_input($args_input);
									echo form_error('viadeo');
									?></div>
									
								<?php
									//Champ linkedin
									if(isset($fiche) && $fiche->linkedin() != ""){ $value = $fiche->linkedin() ; }else{ $value = set_value('linkedin'); }
									$args_label = array(
									    'class' => 'form-label fl-space2'
									);
									
									$args_input = array(
										"name"	=>	"linkedin",
										"id"	=>	"linkedin",
										"value"	=>	$value,
										"class"	=> "text fl-space2",
										"size"	=>	110
									);
									?>
									<div class="form-field clear">
									<?php
									echo form_label('LinkedIN : ', 'linkedin', $args_label);
									echo form_input($args_input);
									echo form_error('linkedin');
									?></div>
									
							
														
								<br /><br /><br />

					
													
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
					"sub_menu_actif"		=>	"fiche_ressoc_form",
					"form_name"				=>	"ressoc_form",
					"id_fiche"				=>	$fiche->id_fiche()
				);
				$this->layout->view("_fiche_sub_menu", $sidebar_datas); 
				?>
				
							
			</div>
		</div><!-- END OF BOX-WRAP -->
	</div>
</div>



<!-- ---------------------------------------------------------- OLD PAGE ----------------------------------------------------->
			