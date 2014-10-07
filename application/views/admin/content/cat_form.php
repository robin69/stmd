<div class="main pagesize"> <!-- *** mainpage layout *** -->
	<div class="main-wrap">
		<div class="page clear">
			<h1><?php echo $title; ?></h1>
			<p>Menu utilisateur : <a class="button blue" href="<?php echo site_url("admin/categories"); ?>/liste/status/tous">Liste</a> | <a class="button green" href="<?php echo site_url("admin/categories"); ?>/add">Ajouter</a> </p>
			
			<div class="column clear">
					<div class="col2-3">
					<div class="content-box">
					<div class="box-body">
						<div class="box-header clear">
							<h2>La catégorie</h2>
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
										"id"	=>	"cat_form"
									);
									if($form == "modif")
									{
										$hidden = array("id_category" => $cat->id_category() );
										echo form_open("admin/categories/edit/".$cat->id_category(), $attr, $hidden);	
									}else{
										echo form_open("admin/categories/add", $attr);
									}
									
									
									
									//Champ Titre public
									$args_label = array(
									    'class' => 'form-label size-200 fl-space2'
									);
		
									if(isset($cat) && $cat->public_name() != ""){ $value = $cat->public_name() ; }else{ $value = set_value('public_name'); }
									$args_input = array(
										"name"	=>	"public_name",
										"id"	=>	"public_name",
										"value"	=>	$value,
										"class"	=> "required text fl-space2 size-200"
									);
									?>
									<div class="form-field clear">
									<?php
									echo form_label('Titre : ', 'public_name', $args_label);
									echo form_input($args_input);
									echo form_error('public_name');
									?></div>
									
								
								<?php
									//Champ titre système
									if(isset($cat) && $cat->slug() != ""){ $value = $cat->slug() ; }else{ $value = set_value('slug'); }
									$args_label = array(
									    'class' => 'form-label size-200 fl-space2 '
									);
									
									$args_input = array(
										"name"	=>	"slug",
										"id"	=>	"slug",
										"value"	=>	$value,
										"class"	=> "text fl-space2 size-200"
									);
									?>
									<div class="form-field clear">
									<?php
									echo form_label('Slug : ', 'slug', $args_label);
									echo form_input($args_input);
									echo form_error('slug');
									?></div>
									
									
									<?php
									//Champ Type
									$i=1;
									?><div class="form-field clear"><?php

									foreach($types as $type)
									{
										
										
										if($cat->type()>=1){	
											if(in_array($type->slug , $cat->type() )){
		
												$value = TRUE;
											}else{
												$value = FALSE;
											}
										}else{
											$value = set_checkbox("type_checkbox_".$i,$type->slug );
										}
										
										
										//On génère le champ
										$label[$i]	=	array(
										 	'class' => 'fl'
										);
										
										$args_input[$i] = array(
											"name"	=>	"type[]",
											"id"	=>	"type_checkbox_".$i,
											"value"	=>	$type->slug ,
											"checked"=>	$value,
											"class"	=> "fl"
										);
										
										echo form_checkbox($args_input[$i]);
										echo form_label($type->public_name, 'type_checkbox_'.$i, $label[$i]);
										echo form_error('type[]');
										
										
										$i++;
									}
									?>
									</div>
									
									
									<?php
									//Champ parent
		
									if(isset($cat) && $cat->parent_cat() != ""){ $value = $cat->parent_cat() ; }else{ $value = set_value('parent_cat'); }
									$args_label = array(
									    'class' => 'form-label size-200 fl-space2'
									);
									
									$parent_options = array(
										"0"	=>	"C'est un domaine (pas de parent)"
									);
									foreach($cat_liste as $key=>$cat_option)
									{
										$parent_options[$cat_option->id_category] = $cat_option->public_name;
									}
		
									?>
									<div class="form-field clear">
									<?php
									echo form_label('Parent : ', 'parent_cat', $args_label);
									echo form_dropdown('parent_cat',$parent_options, $value);
									echo form_error('parent_cat');
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
					"sub_menu_actif"		=>	"cat_form",
					"form_name"				=>	"cat_form",
					"id_user"				=>	$cat->id_category()
				);
				$this->layout->view("_cat_sub_menu", $sidebar_datas); 
				?>						
									
		</div><!-- end of page -->
	</div>
</div>
