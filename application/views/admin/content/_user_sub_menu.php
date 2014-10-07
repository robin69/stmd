<?php

$status = $utilisateur->compte_status();
switch($status)
{
	case "active" :	//Si le status est publier, il faut pouvoir dépublier :
						$publishing_uri 	= site_url("admin/utilisateurs")."/non-active/".$utilisateur->id_user() ;	
						$publishing_label	= "Désactiver le compte";
						break;
					
	case "non-active" ://Si le status est publier, il faut pouvoir dépublier :
						$publishing_uri = site_url("admin/utilisateurs")."/active/".$utilisateur->id_user() ;	
						$publishing_label	= "Activer le compte";
						break;
}
?>
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
										
										
									</div>
										
										
										<div class="rule"></div>
										
										<h4>Infos</h4>
										<div class="mark_blue bt-space20">
											<ul class="standard clean-padding bt-space20">
												<li class="bt-space5"><strong>Dernière connexion : </strong><?php echo $utilisateur->lastcnx(TRUE); ?></li>
												<li class="bt-space5"><strong>Fiche : </strong>
												<?php
													$nbr_fiche = count($utilisateur->has_fiche());
													if($nbr_fiche >= 1)
													{
														foreach($utilisateur->has_fiche() as $fiche)
														{
															$f = new Fiche;
															$f->hydrate($fiche);
															?>
															<br />- <a href="<?php echo site_url("admin/inscrits"); ?>/edit_fiche_infos/<?php echo $f->id_fiche(); ?>"><?php echo $f->raison_sociale(); ?></a>
															<?php
															
															unset($f);
														}
														
													}else{
														?>
															<br />0
														<?php
													}
													
												?></li>
												<li class="bt-space5"><strong>Compte actif : </strong>
													<?php
														if($utilisateur->compte_status() == "active")
														{
															echo "Oui";
														}else{
															echo "non";
														}
													?>
													
												</li>
											</ul>
										</div>
										
										<div class="rule"></div>
										
										<!--
<div class="mark_blue bt-space20">
											<h4>INFORMATIONS IMPORTANTES :</h4>
			
											<ul class="standard clean-padding bt-space20">
												<li class="bt-space5">L'email renseigné pour le contact sera utilisé par le système pour les mails transactionnels, mais ne sera pas publié dans les pages de l'annuaire.</li>
												<li class="bt-space5">L'administrateur ne voit pas le mot de passe, mais il peut le réinitialiser. Si vous souhaitez communiquer un nouveau mot de passe à votre contact... notez-le !</li>
											</ul>
										</div>
-->
										
											<div class="rule"></div>
									</div>
								</div><!-- end of Sidebar -->
							</div>
						</div>
					</div>
				</div> <!-- cal1-3 lastcol -->