<div class="main">
	
	<article class="main_blocks sect_princ">
		<h1>FICHE : Descriptions</h1>
		<hr/>

        <p>Décrivez votre société, son activité et son expertise. Soyez précis tout en restant accrocheur.</p>


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
                "id"    =>"form_fiche_description",
                "name"    =>"form_fiche_description",
                "class" =>"form_description",
                "method"=>"post",
                "action"=>"#"];
            echo form_open("", $form_attr);

            //Description
            echo form_label("Description de la société :", "description");
            $description = [
                "name"  =>  "description",
                "id"    =>  "description",
                "class" =>  "countchar",
                "cols"  =>  "75",
                "rows"  =>  "10",
                "value" =>  ($fiche->description()) ? $fiche->description() : set_value('description'),
                "placeholder"   =>"",
                "onClick"   =>  ""
            ];
            echo form_textarea($description,$js)."
            <p>Nbr maximum de caractères : <span id='max_char'>".$this->config->item("nbr_carr_max_excerpt")."</span></p>
            <p>Caractères restants : <span id='left_char'>".($this->config->item("nbr_carr_max_excerpt") - strlen($fiche->description()))."<span></p>
            <p>".form_error('description')."</p>";
            


            //Form button
            $form_button_attr= [
                "type"  => "submit",
                "class" =>  "prev",
                "id"    =>  "form_submit_btn",
                "content"=> "Enregistrer"

            ];
            echo form_button($form_button_attr);


            form_close();

            ?>

	</article>
	
		<?php
			$this->layout->view("/esp_inscrit/_menu.php", $this->data);
		?>
	
</div>