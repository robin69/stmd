<div class="seach_sidebar">
					<?php
						//Si on fait une recherche on n'affiche pas le menu categorie.
						if($menu_sidebar=="prestas"):
					?>
                            <div class="pub pave">Gigabannière IAB : 300px X 250px </div>
					<div class="categories">
						<h2>
						catégories
						</h2>
						<p>Cliquez sur la catégorie souhaitée et visualisez ci-contre les prestataires trouvés</p>

						<?php 
							if(count($menu_categories)>=1):
								?>
								<ul class="menu_acordion">
									<?php 
										$i=0;
											foreach($menu_categories as $key=>$cat):
											$i++;
									?>
										<li class="item<?php echo $i; ?>" id="one"><a href="<?php echo base_url("annuaire/".$domaine); ?>/cat-<?php echo $cat["slug"]; ?>"><?php echo $cat["public_name"]; ?> (<?php echo $cat["nbr_fiche"]; ?>)</a>
										<?php
										if(count($cat["sous_cats"])>=1)
										{
											?>
											<ul>
												<?php 
												$j=0;
												foreach($cat["sous_cats"] as $sscat)
												{
													$j++;
													?>
													<li class="subitem<?php echo $j; ?>"><a href="#">> <?php echo $sscat["public_name"]; ?> </a></li>
													<?php
													
												}?>
											</ul>
									<?php } ?>
										
										</li>
										
									
									<?php endforeach; ?>
								</ul>
							<?php endif;?>
					</div>
					<?php
						endif;
					?>

                    <div class="pub sidekick">Bannière SideKick : 300px X 600px </div>
					<div class="annonces">
					
						<a href="#"><img src="<?php echo base_url("assets"); ?>/img/annonce1.png"></a>
						<a href="#"><img src="<?php echo base_url("assets"); ?>/img/annonce2.png"></a>
						<a href="#"><img src="<?php echo base_url("assets"); ?>/img/annonce3.png"></a>
					</div>

					<div class="actualites">

						<h2>Actualités</h2>
						<h3>L’ ANCS a déjà 10 ans</h3>
						<p>
						Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore utate velit essecons <span>...</span>
						</p>
						
						<h3>L’ ANCS a déjà 10 ans</h3>
						<p>
						Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore utate velit essecons <span>...</span>
						</p>
						
						<h3>L’ ANCS a déjà 10 ans</h3>
						<p>
						Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore utate velit essecons <span>...</span>
						</p>
					</div>


				</div>