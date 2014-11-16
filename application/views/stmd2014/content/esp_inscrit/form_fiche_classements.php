><div class="main classement_form">
	
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
            $form_attr = [
                "id"    =>"classement_form",
                "name"    =>"classement_form",
                "class" =>"form_description",
                "method"=>"post",
                "action"=>"#"];
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

		foreach ($types as $type)
		{
            $j++;
			//On récupère les catégories
			$c = new Category;
			$cats = $c->get_cat_by_type($type->slug, FALSE);
			
			?>
			<section id="cat_sel_<?php echo $type->slug; ?>" style="display: none;">
				<h3>Sélectionnez les catégories de type <?php echo $type->public_name; ?></h3>
				<ul>

				<?php

                    foreach($cats as $cat) :
                       $j++;

                        //On récupère les sous-catégorie si cette catégorie en a.
                        $ss_cats = $c->get_child($cat["id_category"]);
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
								<?php foreach($ss_cats as $ss_cat):
                                    $j++;

                                    if(in_array($ss_cat->id_category, $f_cat))
                                    {
                                        $checked = " checked ";
                                    }else{
                                        $checked = "";
                                    }



                                    ?>
									<li><input id="input_<?php echo $j; ?>" class="sscat_<?php echo $ss_cat->id_category; ?>" type="checkbox" name="categories[]" value="<?php echo $ss_cat->id_category; ?>" <?php echo $checked; ?>>
                                        <label for="input_<?php echo $j; ?>">  <?php echo $ss_cat->public_name; ?></label></li>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?> 
					</li>
				<?php endforeach; ?>
				</ul>

			</section>
			<div class="clear"></div>
			<?php
			
		}

                //Form button
                $form_button_attr= [
                    "type"  => "submit",
                    "class" =>  "prev",
                    "id"    =>  "form_submit_btn",
                    "content"=> "Enregistrer"

                ];
                echo form_button($form_button_attr);
		?></form>
	</article>
		<?php
			$this->layout->view("/esp_inscrit/_menu.php", $this->data);
		?>
</div>