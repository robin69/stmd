<div class="main">
	
	<article class="main_blocks sect_princ">
		<h1>FICHE : Contact</h1>
		
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
                "id"    =>"form_fiche_contact",
                "name"    =>"form_fiche_contact",
                "class" =>"form_description",
                "method"=>"post",
                "action"=>"#");
            echo form_open("", $form_attr);

            //Nom Contact
            echo $lab_nom = form_label("Nom contact :", "nom_contact");
            $fi_nom = array(
                "type"  => "text",
                "name"  =>  "nom_contact",
                "id"    =>  "nom_contact",
                "value" =>  ($fiche->nom_contact()) ? $fiche->nom_contact() : set_value('nom_contact'),
                "placeholder"   =>"Ex: Garcia"
            );
            echo form_input($fi_nom)."<p>".form_error('nom_contact')."</p>";

            //Prénom Contact
            echo $lab_prenom = form_label("Prénom contact :", "prenom_contact");
            $fi_prenom = array(
                "type"  => "text",
                "name"  =>  "prenom_contact",
                "id"    =>  "prenom_contact",
                "value" =>  ($fiche->prenom_contact()) ? $fiche->prenom_contact() : set_value('prenom_contact'),
                "placeholder"   =>"Ex: José"
            );
            echo form_input($fi_prenom)."<p>".form_error('prenom_contact')."</p>";

            //Email Contact
            echo $lab_email = form_label("Email contact :", "email_contact");
            $fi_email = array(
                "type"  => "email",
                "name"  =>  "email_contact",
                "id"    =>  "email_contact",
                "value" =>  ($fiche->email_contact()) ? $fiche->email_contact() : set_value('email_contact'),
                "placeholder"   =>"Ex: jose.garcia@gmail.com"
            );
            echo form_input($fi_email)."<p>".form_error('email_contact')."</p>";

            //Tel Contact
            echo $lab_tel = form_label("Tél. contact :", "tel_contact");
            $fi_tel = array(
                "type"  => "tel",
                "name"  =>  "tel_contact",
                "id"    =>  "tel_contact",
                "value" =>  ($fiche->tel_contact()) ? $fiche->tel_contact() : set_value('tel_contact'),
                "placeholder"   =>"Ex: 06 12 34 45 67"
            );
            echo form_input($fi_tel)."<p>".form_error('tel_contact')."</p>";


            //Form button
            $form_button_attr= array(
                "type"  => "submit",
                "class" =>  "prev",
                "id"    =>  "form_submit_btn",
                "content"=> "Enregistrer"

            );
            echo form_button($form_button_attr);



        ?>

			<!--<label for="nom_contact" class="" >Nom contact :</label>
			<input type="text" name="nom_contact" id="nom_contact" placeholder="" value="" />
			<p></p>

			<label for="prenom_contact" class="">Prénom contact :</label>
			<input type="text" name="prenom_contact" id="prenom_contact" placeholder="" value="" />
			<p></p>
			
			<label for="email_contact" class="">Email contact :</label>
			<input type="email" name="email_contact" id="email_contact" placeholder="ex. : jose.garcia@gmail.com" value="" />
			<p></p>
			
			<label for="tel_contact" class="">Téléphone contact :</label>
			<input type="tel" name="tel_contact" id="tel_contact" placeholder="ex. : 06 12 34 45 67" value="" />
			<p></p>
			
			<div class="clear"></div>
			<button type="submit" class="prev">Enregistrer</button>-->
        <?php
        form_close();
        ?>
	</article>
	
		<?php
			$this->layout->view("/esp_inscrit/_menu", $this->data);
		?>
	
</div>