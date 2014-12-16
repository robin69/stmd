
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
								<h2>Description de la société</h2>
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
										"id"	=>	"desc_form"
										);
									if($form == "modif")
									{
										$hidden = array("id_fiche" => $fiche->id_fiche() );
										echo form_open("admin/inscrits/edit_fiche_desc/".$fiche->id_fiche() , $attr, $hidden);	
									}else{
										echo form_open("admin/inscrits/add", $attr);
									}
								?>
								
								<h3>La société</h3>
								<div class="rule"></div>
									<?php
									if(isset($fiche) && $fiche->description() != ""){ $value = $fiche->description() ; }else{ $value = set_value('description'); }
									$args_area = array(
										"class"	=>	"jwysiwyg",
										"name"	=>	"description",
										"id"	=>	"description",
										"value"	=>	$value,
										
									);
									echo form_textarea($args_area);
									echo form_error('description');
									?>
									
									<h3>Ses compétences</h3>
									<div class="rule"></div>
									<?php
									if(isset($fiche) && $fiche->competences() != ""){ $value = $fiche->competences() ; }else{ $value = set_value('competences'); }
									$args_area = array(
										"class"	=>	"jwysiwyg",
										"name"	=>	"competences",
										"id"	=>	"competences",
										"value"	=>	$value,
										
									);
									echo form_textarea($args_area);
									echo form_error('competences');
									?>
								
									<h3>Certifications</h3>
									<div class="rule"></div>
									<?php
									if(isset($fiche) && $fiche->certifications() != ""){ $value = $fiche->certifications(); }else{ $value = set_value('certifications'); }
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
									<div class="rule"></div>
									<?php
									if(isset($fiche) && $fiche->references() != ""){ $value = $fiche->references() ; }else{ $value = set_value('references'); }
									$args_area = array(
										"class"	=>	"jwysiwyg",
										"name"	=>	"references",
										"id"	=>	"references",
										"value"	=>	$value,
										
									);
									echo form_textarea($args_area);
									echo form_error('references');
									?>
			
							
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
					"sub_menu_actif"		=>	"fiche_desc_form",
					"form_name"				=>	"desc_form",
					"id_fiche"				=>	$fiche->id_fiche(),
                    "fiche"                 => $fiche
				);
				$this->layout->view("_fiche_sub_menu", $sidebar_datas); 
				?>
				
							
			</div>
		</div><!-- END OF BOX-WRAP -->
	</div>
</div>



<!-- ---------------------------------------------------------- OLD PAGE ----------------------------------------------------->
			