<div class="main">
<?php
if(count($alaune)>=1) :
?>
<div class="alaune">
	<h2>à la une</h2>
		<div id="ca-container" class="ca-container">
			<div class="ca-wrapper">
			<?php
			
			
				foreach($alaune as $fiche):
					$description = trim($description = strip_tags($fiche["description"]));
					$desc_limit = $this->config->item("nbr_carr_max_excerpt");
					$description = substr($description, 0, $desc_limit).' ...';
			?>
				<div class="ca-item ca-item-<?php echo $fiche["id_fiche"]; ?>">
						<div class="ca-item-main">
							<div class="alaune_container">
								<div class="coordonnees">
									<a class="eye view_details" href="#" onclick="slide_info(<?php echo $fiche["id_fiche"]; ?>);  return false;" ></a>
									<!-- <a class="bubble" href="#">2</a> -->
									<span class="ratings">
										<a class="rating_up" href="#" onclick="fiche_eval(<?php echo $fiche["id_fiche"]; ?>, 1); return false;" ></a>
										<a class="rating_up" href="#" onclick="fiche_eval(<?php echo $fiche["id_fiche"]; ?>, 2); return false;" ></a>
										<a href="#" onclick="fiche_eval(<?php echo $fiche["id_fiche"]; ?>, 3); return false;" ></a>
										<a href="#" onclick="fiche_eval(<?php echo $fiche["id_fiche"]; ?>, 4); return false;" ></a>
										<a href="#" onclick="fiche_eval(<?php echo $fiche["id_fiche"]; ?>, 5); return false;" ></a>
									</span>
								</div>
								<h4><a href="#" class="view_details" onclick="slide_info(<?php echo $fiche["id_fiche"]; ?>); return false;" ><?php echo $fiche["raison_sociale"]; ?></a></h4>
								<span>Catégorie - Sous-catégorie - autre catégorie<br>encore une catégorie</span>
								
								
								<p><?php echo $description ?></p>
								
								<div class = "alaune_details">
								
								</div>
							</div><!-- EOF alaune_container -->	
							
							
							<div class="result_map" id="infos_<?php echo $fiche["id_fiche"]; ?>" styles="display: block;">
								<!-- INFOS générales sur le prestataires MD -->
								<div class="informations">
									<p><a class="eye" href="#"></a> informations</p>
								</div>
								
								<!-- COMMENTAIRES sur le prestataires MD -->
								<!--
<div class="commentaires">
									<p><a class="bubble" href="#">2</a> commentaires</p>
								</div>
-->
								
								<!-- EVALUATIONS sur le prestataires MD -->
								<div class="evaluations">
									<p>
										<span class="ratings">
											<a class="rating_up" href="#" onclick="fiche_eval(<?php echo $fiche["id_fiche"]; ?>, 1); return false;" ></a>
											<a class="rating_up" href="#" onclick="fiche_eval(<?php echo $fiche["id_fiche"]; ?>, 2); return false;" ></a>
											<a href="#" onclick="fiche_eval(<?php echo $fiche["id_fiche"]; ?>, 3); return false;" ></a>
											<a href="#" onclick="fiche_eval(<?php echo $fiche["id_fiche"]; ?>, 4); return false;" ></a>
											<a href="#" onclick="fiche_eval(<?php echo $fiche["id_fiche"]; ?>, 5); return false;" ></a>
										</span>
									évaluations
									</p>
								</div>
								<div class="clear"></div>
								
								<!-- GOOGLE MAP sur le prestataires MD -->
								<?php
									//On prépare l'adresse pour Google Map
									$adresse = addslashes($fiche["adr1"]." ".$fiche["cp"]." ".$fiche["ville"]);
								?>
								<div id="maps_container<?php echo $fiche["id_fiche"]; ?>" >Lieu 1 : Voir la carte
								 
								  <div id="map_canvas<?php echo $fiche["id_fiche"]; ?>" style="width:575px; height:165px;" ></div>
								 
								</div>
								
								<!-- COORDONNEES sur le prestataires MD -->
								<div class="coordonnees_map">
									<h4>NOUS CONTACTER</h4>
									
									<input type="hidden" id="adresse_<?php echo $fiche["id_fiche"]; ?>" value="<?php echo $fiche["adr1"]; ?> <?php echo $fiche["cp"]; ?> <?php echo $fiche["ville"]; ?>" />
									<input type="hidden" id="id_fiche_<?php echo $fiche["id_fiche"]; ?>" value="<?php echo $fiche["id_fiche"]; ?>" />
									<p><?php echo $fiche["adr1"]; ?>
									<?php if($fiche["adr2"] !=""){ echo $fiche["adr2"];} ?> - <?php echo $fiche["cp"]; ?> <?php echo $fiche["ville"]; ?><br>
									<?php if($fiche["tel_societe"] !=""){echo "Tél  ".$fiche["tel_societe"];}?> - 
									<?php if($fiche["fax"] !=""){echo "Fax  ".$fiche["fax"];}?><br>
									<?php if($fiche["email_societe"] !=""){echo "Mail  :  ".$fiche["email_societe"];}?><br>
									<?php if($fiche["site"] !=""){
												echo "Site internet  :  ";
												echo "<a href='".$fiche["site"]."' title='".$fiche["raison_sociale"]."'>".$fiche["site"]."</a>";
												}
									?><br>
									
									<a href="#" class="close" onclick="slide_info(<?php echo $fiche["id_fiche"]; ?>); return false;">fermer&nbsp;&nbsp;&nbsp;&nbsp;X</a>
								</div>
							</div>
						</div>
					</div>
					<?php endforeach;?>
				</div>
			</div>
		</div>
		<?php endif; ?>
		<div class="clear"></div>
		<div class="search_result">
			<div class="search_container">
				<div class="paginacion paginacion_top">
					<?php echo $this->pagination->create_links(); ?> 
				</div>
				
				<h1>Résultats (<?php echo $total_fiches; ?>)</h1>
					<?php
					// $i est initialisé dans les annonces à la une.
					foreach($fiches as $fiche)
					{
						$description = trim($description = strip_tags($fiche["description"]));
						$desc_limit = $this->config->item("nbr_carr_max_excerpt");
						$description = substr($description, 0, $desc_limit).' ...';
						
					

						switch($fiche["type_slug"])
						{
							case 	"conseiller_securite"	:	$icone_class = "result_conseiller";	break;
							case	"expediteurs_md"		:	$icone_class = "result_expert";	break;
							default 						:	$icone_class = ""; break;
						}
						?>
						
						
						<a href="#"><div class="result_icons <?php echo $icone_class; ?>"></div></a>
						<div class="result_text">
							<h4><a href="#" onclick="slide_info(<?php echo $fiche["id_fiche"]; ?>);  return false;" ><?php echo $fiche["raison_sociale"]; ?></a></h4>
							<?php 
								if(isset($fiche["category"]) AND $fiche["category"]!="")
								{
									$i=0;
									foreach($fiche["category"] as $key => $cat)
									{
										if($i>=1){ echo "<span> - "; }else{ echo "<span>";}
										?>
											<a href="<?php echo base_url("annuaire/".$domaine)."/cat-".$cat["slug"]; ?>"><?php echo $cat["public_name"]; ?></a></span> 
										<?php
										
									}
								}
							?>
							
							<p><?php echo $description; ?></p>
							
							<div class="result_map" id="infos_<?php echo $fiche["id_fiche"]; ?>" >
								<!-- INFOS générales sur le prestataires MD -->
								<div class="informations">
									<p><a class="eye" href="#"></a> informations</p>
								</div>
								
								<!-- COMMENTAIRES sur le prestataires MD -->
								<!--
<div class="commentaires">
									<p><a class="bubble" href="#">2</a> commentaires</p>
								</div>
-->
								
								<!-- EVALUATIONS sur le prestataires MD TOTO -->
								<div class="evaluations">
									<p>
										<span class="ratings">
											<?php
												for($i=1; $i<=5; $i++)
												{
/* 													echo "Fiche average : ".$fiche["eval_average"]; */
													if($fiche["eval_average"] >= $i)
													{
														$class_rating = "rating_up";
													}else{
														$class_rating = "";
													}
													?>
													<a class="<?php echo $class_rating; ?>" href="#" onclick="fiche_eval(<?php echo $fiche["id_fiche"]; ?>, <?php echo $i;  ?>); return false;" ></a>
													<?php 
												}
											?>
										</span>
									évaluations
									</p>
								</div>
								<div class="clear"></div>
								
								<!-- GOOGLE MAP sur le prestataires MD -->
								<?php
									//On prépare l'adresse pour Google Map
									$adresse = addslashes($fiche["adr1"]." ".$fiche["cp"]." ".$fiche["ville"]);
								?>
								<div id="maps_container<?php echo $fiche["id_fiche"]; ?>" >Lieu 1 : Voir la carte
								 
								  <div id="map_canvas<?php echo $fiche["id_fiche"]; ?>" style="width:698px; height:216px;" ></div>
								 
								</div>
								
								<!-- COORDONNEES sur le prestataires MD -->
								<div class="coordonnees_map">
									<h4>NOUS CONTACTER</h4>
									
									<input type="hidden" id="adresse_<?php echo $fiche["id_fiche"]; ?>" value="<?php echo $fiche["adr1"]; ?> <?php echo $fiche["cp"]; ?> <?php echo $fiche["ville"]; ?>" />
									<input type="hidden" id="id_fiche_<?php echo $fiche["id_fiche"]; ?>" value="<?php echo $fiche["id_fiche"]; ?>" />
									<p><?php echo $fiche["adr1"]; ?>
									 <?php if($fiche["adr2"] !=""){ echo $fiche["adr2"];} ?> - <?php echo $fiche["cp"]; ?> <?php echo $fiche["ville"]; ?><br>
									<?php if($fiche["tel_societe"] !=""){echo "Tél  ".$fiche["tel_societe"];}?> - 
									<?php if($fiche["fax"] !=""){echo "Fax  ".$fiche["fax"];}?><br>
									<?php if($fiche["email_societe"] !=""){echo "Mail  :  ".$fiche["email_societe"];}?><br>
									<?php if($fiche["site"] !=""){
												echo "Site internet  :  ";
												echo "<a href='".$fiche["site"]."' title='".$fiche["raison_sociale"]."'>".$fiche["site"]."</a>";
												}
									?><br>
									
									<a href="#" class="close" onclick="slide_info(<?php echo $fiche["id_fiche"]; ?>); return false;">fermer&nbsp;&nbsp;&nbsp;&nbsp;X</a>
								</div>
							</div>
							
							<div class="coordonnees">
								<a class="eye" href="#" onclick="slide_info(<?php echo $fiche["id_fiche"]; ?>, 'slide');  return false;" ></a>
								<!-- <a class="bubble" href="resultats-annuaire.html#">2</a> -->
								<span class="ratings">
									<?php
												switch($fiche["eval_average"])
												{
													case "1"	:	$rate_star_1 = "rating_up";
																	$rate_star_2 = "rating_up";
																	$rate_star_1 = "rating_up";
																	$rate_star_1 = "rating_up";
																	$rate_star_1 = "rating_up";
																	
												}
												for($i=1; $i<=5; $i++)
												{
													if($fiche["eval_average"] >= $i)
													{
														$class_rating = "rating_up";
													}else{
														$class_rating = "";
													}
													?>
													<a class="<?php echo $class_rating; ?>" href="#" onclick="fiche_eval(<?php echo $fiche["id_fiche"]; ?>, <?php echo $i;  ?>); return false;" ></a>
													<?php 
												}
											?>
								</span>
							</div>
						</div>
						
						<div class="clear"></div>
						
						

						<?php

					}
					?>
				
				
					<div class="clear"></div>
					<hr>
					<div class="paginacion">
						<?php echo $this->pagination->create_links(); ?> 
					</div>

				</div>
				<?php
					$this->layout->view("_sidebars", 	$this->data);
				?>

			</div>
		</div>
