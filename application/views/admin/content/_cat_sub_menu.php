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
												<li class="bt-space5"><strong>Fiche : </strong></li>
												<li class="bt-space5"><strong>Compte actif : </strong></li>
											</ul>
										</div>
										

									
											<div class="rule"></div>
									</div>
								</div><!-- end of Sidebar -->
							</div>
						</div>
					</div>
				</div> <!-- cal1-3 lastcol -->