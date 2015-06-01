<div class="main classement_form">
	
	<article class="main_blocks sect_princ">
		<h1>FICHE : Classement</h1>
		<hr/>

        <?php if(isset($returned_message)) {
            ?>
            <div class="ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;">
                <p>
                    <span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span>
                    <strong><?php echo $returned_message; ?></strong>

                </p>
            </div>
        <?php
        }


            //Ouverture formulaire
            $form_attr = array(
                "id"    =>"classement_form",
                "name"    =>"classement_form",
                "class" =>"form_description",
                "method"=>"post",
                "action"=>"#");
            echo form_open("", $form_attr);
        ?>
		<section class="form_type">
			<h3>Sélectionner le type d'activité</h3>
			
				<ul>
				<?php 
				$i=0;
				foreach($types as $type)
				{

                    $f_types = $fiche->types();
                    if(in_array($type->slug, $f_types))
                    {
                        $checked = " checked ";
                    }else{
                        $checked = "";
                    }





					?>
					<li><input id="<?php echo $type->slug; ?>" class="type" type="checkbox" name='types[]' value="<?php echo $type->slug; ?>" <?php echo $checked; ?>> <label for="<?php echo $type->slug; ?>"><?php echo $type->public_name; ?></label></li>
					<?php
					$i++;
				}?>
				</ul>
			
		</section><!-- EOF .form_type -->
		
		<?php

        $j = 0; // incrément pour définir les id des inputs


           // var_dump($types);

		foreach ($types as $type)
		{

            $j++;

			if($type->slug != "conseiller_securite")
            {
                //On récupère les catégories
                $c = new Category;
                $cats = $c->get_cats_list($type->slug, TRUE);
                ?>

                <section id="cat_sel_<?php echo $type->slug; ?>" style="display: none;">
				<h3>Sélectionnez les catégories de type <?php echo $type->public_name; ?></h3>
                <ul>

                    <?php

                        foreach($cats as $cat) :
                            $j++;

                            //On récupère les sous-catégorie si cette catégorie en a.
                            $ss_cats = (array)$c->get_child($cat["id_category"]);





                            if(count($ss_cats)>=1) {
                                $hasSubCats = "has_sscats";
                                $subClassId = "ss_cat_".$j;
                            }else{
                                $hasSubCats = "";
                            }






                            $f_cat = $fiche->categories();

                            if(in_array($cat["id_category"], $f_cat))
                            {
                                $checked = " checked ";
                            }else{
                                $checked = "";
                            }
                            ?>

                            <li><input  id="input_<?php echo $j; ?>" class="classement_cat cat_<?php echo $cat["id_category"]; ?> <?php echo $hasSubCats; ?>" type="checkbox" name="categories[]" value="<?php echo $cat["id_category"]; ?>" <?php echo $checked; ?>>
                                <label for="input_<?php echo $j; ?>"><?php echo $cat["public_name"]; ?></label>
                                <?php

                                    if(count($ss_cats)>=1):
                                        ?>
                                        <ul class="ss_cat ss_cat_<?php echo $j; ?>" style="display: none;">
                                            <?php foreach($ss_cats as $key_sscat => $ss_cat ):
                                                $j++;

                                                if(in_array($ss_cat->id_category, $f_cat))
                                                {
                                                    $checked = " checked ";
                                                }else{
                                                    $checked = "";
                                                }





                                                ?>
                                                <li><input id="input_<?php echo $j; ?>" class="sscat_<?php echo $ss_cat->id_category; ?>" type="checkbox" name="categories[]" value="<?php echo $ss_cat->id_category; ?>" <?php echo $checked; ?>>
                                                    <label for="input_<?php echo $j; ?>" ><?php echo $ss_cat->public_name; ?></label></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
                            </li>
                        <?php endforeach; ?>
                </ul>

                </section>
                <div class="clear"></div>
                <?php
            }else{
                //Le type est conseillé à la sécurité
                ?>

                <section id="cat_sel_<?php echo $type->slug; ?>" style="display: none;">
                    <h3><?php echo $type->public_name; ?></h3>
                    <h4>Précisez  les zones d'intervention</h4>
                    <ul>
                        <?php

                            foreach($zones as $zone) :


                                $f_zones    =   $fiche->zones();
                                if(in_array($zone->id_zone,$f_zones))
                                {
                                    $checked =   " checked ";
                                }else{
                                    $checked =   " ";
                                }




                            ?>
                        <li>
                            <input id="input_<?php echo $j; ?>" class="zones_<?php echo $zone->id_zone; ?>" type="checkbox" name="zones[]" value="<?php echo $zone->id_zone; ?>" <?php echo $checked; ?>>
                            <label for="input_<?php echo $j; ?>" ><?php echo $zone->public_name; ?></label>
                        </li>
                        <?php

                            $j++;
                            endforeach; ?>
                    </ul>

                    <h4>Précisez les classes de matières</h4>
                    <ul>
                        <?php

                        foreach($classes as $classe) :





                            $f_classes  =   $fiche->classes();
                            if(in_array($classe->classe, $f_classes))
                            {
                                $checked =   " checked ";
                            }else{
                                $checked =   " ";
                            }

                            ?>

                            <li>
                                <input id="input_<?php echo $j; ?>" class="classes_<?php echo $classe->classe; ?>" type="checkbox" name="classes[]" value="<?php echo $classe->classe; ?>" <?php echo $checked; ?>>
                                <label for="input_<?php echo $j; ?>" ><?php echo $classe->classe . " - ". ucfirst($classe->Description); ?></label>
                            </li>
                            <?php

                            $j++;
                        endforeach; ?>
                    </ul>


                    <h4>Précisez les modes de transport</h4>
                    <ul>
                        <?php

                            foreach($mdtransp as $mode) :

                                $f_mdtransp  =   $fiche->mdtransp();
                                if(in_array($mode, $f_mdtransp))
                                {
                                    $checked =   " checked ";
                                }else{
                                    $checked =   " ";
                                }
                                ?>

                                <li>
                                    <input id="input_<?php echo $j; ?>" class="mdtransp_<?php echo $mode; ?>" type="checkbox" name="mdtransp[]" value="<?php echo $mode; ?>" <?php echo $checked; ?>>
                                    <label for="input_<?php echo $j; ?>" ><?php echo ucfirst($mode); ?></label>
                                </li>
                                <?php

                                $j++;
                            endforeach; ?>
                    </ul>
                </section>
                <?php
            }
			?>

			<?php
			
		}

                //Form button
                $form_button_attr= array(
                    "type"  => "submit",
                    "class" =>  "prev",
                    "id"    =>  "form_submit_btn",
                    "content"=> "Enregistrer"

                );
                echo form_button($form_button_attr);
		?></form>
	</article>
		<?php
			$this->layout->view("/esp_inscrit/_menu.php", $this->data);
		?>
</div>