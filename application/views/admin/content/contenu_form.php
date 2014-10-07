<div class="main pagesize"> <!-- *** mainpage layout *** -->
	<div class="main-wrap">
		<div class="page clear">
			<h1><?php echo $title; ?></h1>
			<p>Menu contenus : <a class="button blue" href="<?php echo site_url("admin/contenus"); ?>/liste/status/tous">Liste</a> | <a class="button green" href="<?php echo site_url("admin/contenus"); ?>/add">Ajouter</a> </p>
			
			
			<div class="content-box">
			<div class="box-body">
				<div class="box-header clear">
					<h2>Le contenu</h2>
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
				
				<div class="sidebar1-4 clear">
						<div class="sidebar">
							
							<div class="sidemenu">
								<h4>Menu</h4>
								<ul class="list">
								<li>
									<a href="#" onclick="document.forms['content_form'].submit();">Mettre à jour</a>
								</li>
								<li>
									<?php
										if($contenu->publications_status == "published")
										{
											?>
												<a href="#">Dépublier</a>
											<?php
											
										}
										else
										{
											?>
											<a href="#">Publier</a>
											<?php
										}
									?>
									
								</li>
								<li>
									<a href="#">Supprimer</a>
								</li>
								
								</ul>
								
								<div class="rule"></div>
								
								<h4>Infos</h4>
								<div class="mark_blue bt-space20">
									<ul class="standard clean-padding bt-space20">
										<li class="bt-space5"><strong>Type : </strong><?php echo $contenu->content_type;?></li>
										<li class="bt-space5"><strong>Etat : </strong><?php echo $contenu->publications_status;?></li>
										<li class="bt-space5"><strong>ID : </strong><?php echo $contenu->id_contenu;?></li>
									</ul>
								</div>
								
								<div class="rule"></div>
							</div>
						</div><!-- end of Sidebar -->
						<div class="col3-4">

						
						<?php
						
						
							//Ouverture du formulaire 
							
							$attr = array(
								"class"	=>	"validate-form form bt-space15",
								"id"	=>	"content_form"
								);
							if($form == "modif")
							{
								$hidden = array("id_contenu" => $contenu->id_contenu );
								echo form_open("admin/contenus/edit_submit", $attr, $hidden);	
							}else{
								echo form_open("admin/contenus/add_submit", $attr);
							}
							
							
							
							//Champ Titre
							$args_label = array(
							    'class' => 'form-label size-200 fl-space2'
							);

							if(isset($contenu) && $contenu->title != ""){ $value = $contenu->title; }else{ $value = set_value('title'); }
							$args_input = array(
								"name"	=>	"title",
								"id"	=>	"title",
								"value"	=>	$value,
								"size"	=>	"100",
								"class"	=> "required text fl-space2"
							);
							?>
							<div class="form-field clear">
							<?php
							echo form_label('Titre : ', 'title', $args_label);
							echo form_input($args_input);
							echo form_error('title');
							?></div>
							
						
						<?php
							//Champ guid
							if(isset($contenu) && $contenu->guid != ""){ $value = $contenu->guid; }else{ $value = set_value('guid'); }
							$args_label = array(
							    'class' => 'form-label size-200 fl-space2 '
							);
							
							$args_input = array(
								"name"	=>	"guid",
								"id"	=>	"guid",
								"value"	=>	$value,
								"size"	=>	"100",
								"class"	=> "text fl-space2"
							);
							?>
							<div class="form-field clear">
							<?php
							echo form_label('Adresse : ', 'guid', $args_label);
							echo form_input($args_input);
							echo form_error('guid');
							?></div>
							
							<?php
							//Champ meta_title
							if(isset($contenu) && $contenu->meta_title != ""){ $value = $contenu->meta_title; }else{ $value = set_value('meta_title'); }
							$args_label = array(
							    'class' => 'form-label size-200 fl-space2 '
							);
							
							$args_input = array(
								"name"	=>	"meta_title",
								"id"	=>	"meta_title",
								"value"	=>	$value,
								"size"	=>	"100",
								"class"	=> "text fl-space2"
							);
							?>
							<div class="form-field clear">
							<?php
							echo form_label('Meta_title : ', 'meta_title', $args_label);
							echo form_input($args_input);
							echo form_error('meta_title');
							?></div>
							
							
							
							<?php
							//Champ meta_desc
							$args_label = array(
							    'class' => 'form-label size-200 fl-space2 '
							);
							
							if(isset($contenu) && $contenu->meta_desc != ""){ $value = $contenu->meta_desc; }else{ $value = set_value('meta_desc'); }
							$args_area = array(
								"class"	=>	"",
								"name"	=>	"meta_desc",
								"id"	=>	"meta_desc",
								"rows"	=>	"3",
								"cols"	=>	"100",
								"value"	=>	$value,
								
							);
							echo form_label('Meta_desc : ', 'meta_desc', $args_label);
							echo form_textarea($args_area);
							echo form_error('contenu');
							?>						
							<br /><br /><br />
							<div class="rule"></div>
							
							<?php
							if(isset($contenu) && $contenu->contenu != ""){ $value = $contenu->contenu; }else{ $value = set_value('contenu'); }
							$args_label = array(
							    'class' => 'form-label fl-space2 '
							);
							
							$args_area = array(
								"class"	=>	"jwysiwyg",
								"name"	=>	"contenu",
								"id"	=>	"contenu",
								"rows"	=>	"30",
								"cols"	=>	"30",
								"value"	=>	$value,
								
							);
							?>
							<div class="form-field clear">
							<?php
							echo form_label('Texte principal : ', 'contenu', $args_label);
							echo form_textarea($args_area);
							echo form_error('contenu');
							?>
							</div>
							
							
							
							
							
							
							
						</div>						
						
				</div><!-- END OF BOX-WRAP -->
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
