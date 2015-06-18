
<div class="main pagesize"> <!-- *** mainpage layout *** -->
	<div class="main-wrap">
		<div class="page clear">
			<h1><?php echo $title; ?></h1>

			<div class="column clear">

				<div class="col2-3">
					<div class="content-box">
						<div class="box-body">
							<div class="box-header clear">
								<h2>Le propriétaire de la fiche</h2>
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
										"id"	=>	"user_form"
									);
									$hidden = array("id_fiche" => $fiche->id_fiche() );
									echo form_open("admin/inscrits/edit_fiche_user/".$fiche->id_fiche() , $attr, $hidden);
								?>




								<?php
									//Champ Utilisateur
									$options = $allusers;
									$args_label = array(
										'class' => 'form-label fl-space2'
									);


								?>
								<div class="form-field clear">
									<?php
										echo form_label('L\'utilisateur associé à cette diche', 'user_id', $args_label);
										echo form_dropdown('user_id',$options,$fiche->user_id(),'id="user_id"');
										echo form_error('user_id');
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
						"sub_menu_actif"		=>	"fiche_user_form",
						"form_name"				=>	"user_form",
						"id_fiche"				=>	$fiche->id_fiche()
					);
					$this->layout->view("_fiche_sub_menu", $sidebar_datas);
				?>


			</div>
		</div><!-- END OF BOX-WRAP -->
	</div>
</div>



<!-- ---------------------------------------------------------- OLD PAGE ----------------------------------------------------->
