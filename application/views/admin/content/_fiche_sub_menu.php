<?php




$status = $fiche->publication_status();
switch($status)
{
	case "published" :	//Si le status est publier, il faut pouvoir dépublier :
						$publishing_uri 	= site_url("admin/inscrits")."/unpublish/".$id_fiche ;	
						$publishing_label	= "Dépublier";
						break;
					
	case "unpublished" ://Si le status est publier, il faut pouvoir dépublier :
						$publishing_uri = site_url("admin/inscrits")."/publish/".$id_fiche ;	
						$publishing_label	= "Publier";
						break;
}
?><div class="col1-3 lastcol">
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
												<a href="#" onclick="document.forms['<?php echo $form_name; ?>'].submit();"><?php echo $submit_button_label; ?></a>
											</li>
												<?php
											if($status != ""):
												?>
												<li>
													<a href="<?php echo $publishing_uri;  ?>" ><?php echo $publishing_label; ?></a>
												</li>
												<?php
											endif;
												?>
											<?php 
											if(isset($id_fiche))
											{
												?>
												<li>
													<a href="<?php echo site_url("admin/inscrits")."/delete/".$id_fiche; ?>" onclick="">Supprimer</a>
												</li>
												<?php
											}
											?>
										</ul>


										<div class="rule"></div>

                                        <?php if($fiche->temp() == true): ?>
										<h4>Modération</h4>
                                        <ul class="list">
                                            <li>
                                                <a href="<?php echo site_url("admin/inscrits")."/moderate/".$id_fiche."/true"; ?>" onclick="">Accepter</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo site_url("admin/inscrits")."/moderate/".$id_fiche."/false"; ?>" onclick="">Refuser</a>
                                            </li>
										</ul>
                                        <div class="rule"></div>
                                        <?php endif; ?>



										<h4>Règlement</h4>
                                        <ul class="list">
	                                        <?php if($fiche->payante() == 1): ?>
                                            <li>
                                                <a href="<?php echo site_url("admin/inscrits")."/recieved_payment/".$id_fiche."/true"; ?>" id="reglement" data-id_fiche="<?php echo $fiche->id_fiche(); ?>" data-dt_reglement=<?php echo ($fiche->date_reglement() !="0")? date("Y-m-d",$fiche->date_reglement()) : "0"; ?> >Règlement reçu</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo site_url("admin/inscrits")."/set_payante_status/".$id_fiche."/FALSE"; ?>" id="" onclick="">Passer en GRATUITE</a>
                                            </li>
	                                        <?php elseif($fiche->payante() == false):; ?>
		                                        <li>
			                                        <a href="<?php echo site_url("admin/inscrits")."/set_payante_status/".$id_fiche."/TRUE"; ?>" id="activ_payante" onclick="">Passer à PAYANT</a>
		                                        </li>
	                                        <?php endif; ?>
										</ul>
										<?php $this->load->view("admin/tpl/update_dt_reglement_form");?>

                                        <div class="rule"></div>


										<h4>Informations relatives</h4>
										<div class="mark_blue bt-space20">
											
											<ul class="list">
												<li <?php if($sub_menu_actif == "fiche_infos_form"){ echo ' class="active" ';}else{  echo "";} ?> >
													<a href="<?php echo site_url("admin/inscrits"); ?>/edit_fiche_infos/<?php echo $id_fiche; ?>" >Infos générales</a>
												</li>
												<li <?php if($sub_menu_actif == "fiche_desc_form"){ echo ' class="active" ';}else{  echo "";} ?> >
													<a href="<?php echo site_url("admin/inscrits"); ?>/edit_fiche_desc/<?php echo $id_fiche; ?>">Descriptifs</a>
												</li>
												<li <?php if($sub_menu_actif == "fiche_ressoc_form"){ echo ' class="active" ';}else{  echo "";} ?> >
													<a href="<?php echo site_url("admin/inscrits"); ?>/edit_fiche_ressoc/<?php echo $id_fiche; ?>">Liens sociaux</a>
												</li>
												<li <?php if($sub_menu_actif == "fiche_cats_form"){ echo ' class="active" ';}else{  echo "";} ?>>
													<a href="<?php echo site_url("admin/inscrits"); ?>/edit_fiche_cat/<?php echo $id_fiche; ?>">Type / domaine / catégorie</a>
												</li>
												<li>
													<a href="<?php echo site_url("admin/inscrits"); ?>/edit_fiche_ressoc/<?php echo $id_fiche; ?>">Propriétaire / utilisateur</a>
												</li>
												
												
											</ul>
										</div>
										
										<div class="rule"></div>
										
										<h4>Infos</h4>
										<div class="mark_blue bt-space20">
											<ul class="standard clean-padding bt-space20">
												<li class="bt-space5"><strong>Cpt utilisateur : </strong>
												<?php $owner = new User($fiche->user_id()); ?>
													<a href="<?php echo site_url("admin/utilisateurs"); ?>/edit/<?php echo $owner->id_user(); ?>"><?php echo $owner->prenom(); ?> <?php echo $owner->nom(); ?></a>
												</li>
												<li class="bt-space5"><strong>Fiche : </strong><?php
														if($fiche->payante() == 0){
															echo "Gratuite";

														}else{
															echo "Payante";
														} ;?> </li>
												<?php if ($fiche->payante() == 1): ?>
													<li class="bt-space5"><strong>Date de règlement : </strong><?php echo ($fiche->date_reglement()!="0")? date("d/m/Y", $fiche->date_reglement()) : ""; ?></li>
												<?php endif; ?>
												<li class="bt-space5"><strong>Clics total : </strong></li>
												<li class="bt-space5"><strong>Clics 30j : </strong></li>
												<li class="bt-space5"><strong>Eval : </strong></li>
												<li class="bt-space5"><strong>nbr d'éval : </strong></li>
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