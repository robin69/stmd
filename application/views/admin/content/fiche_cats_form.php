
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
								<h2>Type</h2>
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
										"id"	=>	"cats_form"
										);
									$hidden = array("id_fiche" => $fiche->id_fiche() );
									echo form_open("admin/inscrits/edit_fiche_cat/".$fiche->id_fiche(), $attr, $hidden);
								?>
								
								
								
								<div class="form-field bt-space10">
									<div class="clear">
										
										<?php
											foreach($types as $type)
											{
                                                //Si la fiche a l'option, on coche la case.

                                                //var_dump($fiche);


												if( in_array($type->slug, $fiche->types()) )
                                                {
                                                    $checked    =   "checked";
                                                }else{
                                                    $checked    =   "";
                                                }
												?>
												<div class="form-checkbox-item clear fl-space2">
													<input id="<?php echo $type->slug; ?>" class="checkbox fl-space" type="checkbox" name="types[<?php echo $type->slug; ?>]" rel="checkboxhorizont" value="<?php echo $type->slug; ?>" <?php echo $checked; ?>>
													<label class="fl" for="<?php echo $type->slug; ?>"><?php echo $type->public_name; ?></label>	
												</div>
												<?php
											}
										
										?>
									</div>
								</div>
							</div>
						</div>
					</div><!-- END OF CONTENT BOX LISTE DES TYPES -->

                    <?php
                        /***********
                         * Pour chaque type on affiche la box des catégories corespondantes
                         */

                        foreach($types as $t)
                        {

                           // var_dump($t);
                            //On récupère les catégories du type
                            $c = new Category;
                           // $cats = $c->admin_get_cats_sscats_by_type($t->slug);
                            $cats = $c->admin_get_cats_sscats_by_type2($t->slug);


                            //var_dump($cats);






                            //Affichage des box de classement pour les prestas
                            if($t->slug != 'conseiller_securite')
                            {

                                ?>
                                <div class="content-box" id="cat_sel_<?php echo $t->slug; ?>" style="display: none;">
                                    <div class="box-body">
                                        <div class="box-header box-slide-head clear">
                                            <span class="slide-but">open/close</span>

                                            <h2>Catégories de <?php echo $t->public_name; ?></h2>
                                        </div>
                                        <div class="box-wrap box-slide-body hidden">
                                            <ul>
                                            <?php



                                                $cat_set    =array();
                                                $sscat_set  =array();
                                                    foreach($cats as $cat) :
                                                        $j++;
                                                        /*$is_cat     = false;
                                                        $is_sscat   =   false;

                                                        //Il s'agit d'un domaine
                                                        if(!in_array($cat["id_cat"],$cat_set)){
                                                            array_push($cat_set,$cat["id_cat"]);
                                                            $is_cat =   true;

                                                        }elseif(!in_array($cat["id_sscat"],$sscat_set)){
                                                            //Il s'agit d'une sous-categorie
                                                            array_push($sscat_set,$cat["id_sscat"]);
                                                            $is_sscat =   true;
                                                        }else{
                                                            die("Erreur:: une catégorie n'est ni une catégorie ni une sous catégorie");
                                                        }*/



                                                        if(count($cat->sscats)>=1) {
                                                            $hasSubCats = "has_sscats";
                                                            $subClassId = "ss_cat_".$j;
                                                        }else{
                                                            $hasSubCats = "";
                                                        }


                                                      // var_dump($cat);







                                                        //On récupère les catégories de la fiche
                                                        $f_cat = $fiche->categories();

                                                        //Si la fiche a des catégories affectées, on les compare avec la catégorie courante
                                                        if(is_array($f_cat)){
                                                            if(in_array($cat->id_category, $f_cat))
                                                            {
                                                                $checked = " checked ";
                                                            }else{
                                                                $checked = "";
                                                            }
                                                        }


                                                       // var_dump($cat);




                                                        //Si il s'agit d'une
                                                        ?>

                                                        <li><input  id="input_<?php echo $j; ?>" class="classement_cat cat_<?php echo $cat->id_category; ?> <?php echo $hasSubCats; ?>" type="checkbox" name="categories[]" value="<?php echo $cat->id_category; ?>" <?php echo $checked; ?>>
                                                            <label for="input_<?php echo $j; ?>"><?php echo $cat->public_name; ?></label>
                                                            <?php

                                                                /***
                                                                 * Si la catégorie a une sous-catégorie
                                                                 */
                                                                if(count($cat->sscats)>=1):

                                                                  //  var_dump($cat->sscats);


                                                                    ?>
                                                                    <ul class="ss_cat ss_cat_<?php echo $j; ?>" style="display: ;">
                                                                        <?php foreach($cat->sscats as $key => $sscat):
                                                                            $j++;

                                                                            if(in_array($sscat->sscat_id_category, $f_cat))
                                                                            {
                                                                                $checked = " checked ";
                                                                            }else{
                                                                                $checked = "";
                                                                            }

                                                                            ?>
                                                                            <li><input id="input_<?php echo $j; ?>" class="sscat_<?php echo $sscat->sscat_id_category; ?>" type="checkbox" name="categories[]" value="<?php echo $sscat->sscat_id_category; ?>" <?php echo $checked; ?>>
                                                                                <label for="input_<?php echo $j; ?>" ><?php echo $sscat->public_name; ?></label></li>
                                                                        <?php endforeach; ?>
                                                                    </ul>
                                                                <?php endif; ?>
                                                        </li>
                                                    <?php endforeach; ?>
                                            </ul>


                                        </div>
                                    </div>
                                </div> <!-- EOF Content-box des catégories de chaque type -->
                                <?php
                            }else{
                                //Affichage de la box conseiller à la sécurité
                                ?>

                            <div class="content-box" id="cat_sel_conseiller_securite" style="display: none;">
                                <div class="box-body">
                                    <div class="box-header box-slide-head clear">
                                        <span class="slide-but">open/close</span>

                                        <h2>Classement <?php echo $t->public_name; ?></h2>
                                    </div>
                                    <div class="box-wrap box-slide-body hidden">
                                        <h3>Les zones d'intervention</h3>
                                        <hr />
                                        <ul>
                                        <?php




                                        //On liste les zones
                                            foreach($zones as $zone){

                                                //var_dump($zone);


                                                if(in_array($zone->id_zone, $fiche->zones())){
                                                    $checked    =   "checked";
                                                }else{
                                                    $checked    =   "";
                                                }
                                                ?>
                                                <li><input id="zone_<?php echo $zone->id_zone; ?>" class="zone_<?php echo $zone->id_zone; ?>" type="checkbox" name="zones[]" value="<?php echo $zone->id_zone; ?>" <?php echo $checked; ?>>
                                                    <label for="zone_<?php echo $zone->id_zone; ?>" ><?php echo $zone->public_name; ?></label></li>
                                                <?php
                                            }
                                        ?>
                                        </ul>
                                        <br />
                                        <br />
                                        <br />
                                        <h3>Les modes de transport</h3>
                                        <hr />
                                        <ul>
                                            <?php

                                                (in_array("route", $fiche->mdtransp())) ?       $route_checked    =   "checked" : $route_checked    =   "";
                                                (in_array("fer", $fiche->mdtransp())) ?         $fer_checked    =   "checked" : $fer_checked    =   "";
                                                (in_array("navigation", $fiche->mdtransp())) ?  $navigation_checked    =   "checked" : $navigation_checked    =   "";

                                            ?>
                                            <li><input id="mdtransp_route" class="mdtransp_route" type="checkbox" name="mdtransp[]" value="route" <?php echo $route_checked; ?>>
                                                <label for="mdtransp_route" >Transport par la Route</label></li>
                                            <li><input id="mdtransp_fer" class="mdtransp_fer" type="checkbox" name="mdtransp[]" value="fer" <?php echo $fer_checked; ?>>
                                                <label for="mdtransp_fer" >Transport par Chemin de fer</label></li>
                                            <li><input id="mdtransp_navigation" class="mdtransp_navigation" type="checkbox" name="mdtransp[]" value="navigation" <?php echo $navigation_checked; ?>>
                                                <label for="mdtransp_navigation" >Transport par Voies navigables</label></li>

                                        </ul>

                                        <br />
                                        <br />
                                        <br />
                                        <h3>Les modes Classes de matières</h3>
                                        <hr />
                                        <ul>
                                            <?php
                                                foreach($classes as $classe)
                                                {
                                                    if(in_array($classe->classe, $fiche->classes())){
                                                        $checked    =   "checked";
                                                    }else{
                                                        $checked    =   "";
                                                    }

                                                    ?>
                                                    <li><input id="classe_<?php echo $classe->classe; ?>" class="classe_<?php echo $classe->classe; ?>" type="checkbox" name="classes[]" value="<?php echo $classe->classe; ?>" <?php echo $checked; ?>>
                                                        <label for="classe_<?php echo $classe->classe; ?>" ><?php echo $classe->classe; ?> - <?php echo $classe->Description; ?></label></li>
                                                    <?php
                                                }

                                            ?>


                                        </ul>


                                    </div>
                                </div>
                            </div> <!-- EOF Content-box des catégories de COnseiller à la sécurité -->
                        <?php } ?>

                    <?php } /** END FOREACH TYPE */ ?>

					
					
					

				</div><!-- END OF COL2-3 -->
					<?php form_close(); ?>

			
						
				<?php 
				//Chargement de la sidebar; 
				$sidebar_datas = array(
					"sub_menu_actif"		=>	"fiche_cats_form",
					"form_name"				=>	"cats_form",
					"id_fiche"				=>	$fiche->id_fiche()
				);
				$this->layout->view("_fiche_sub_menu", $sidebar_datas); 
				?>
				
							
			</div>
		</div><!-- END OF BOX-WRAP -->
	</div>
</div>

			