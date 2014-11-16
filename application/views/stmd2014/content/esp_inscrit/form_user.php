<div class="main">
	
	<article class="main_blocks sect_princ">
		<h1>MON COMPTE : Profil</h1>
        <p>Les informations renseignées dans ce forumlaire seront utilisées uniquement dans le cadre de l'administration de votre compte et ne seront en aucun cas visible sur le site.</p>
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
                "id"    =>"form_fiche_profile",
                "name"    =>"form_fiche_profile",
                "class" =>"form_description",
                "method"=>"post",
                "action"=>"#"];
            echo form_open("", $form_attr);

            //Nom Contact
            echo $lab_nom = form_label("Nom :", "nom");
            $fi_nom = [
                "type"  => "text",
                "name"  =>  "nom",
                "id"    =>  "nom",
                "value" =>  ($user->nom()) ? $user->nom() : set_value('nom'),
                "placeholder"   =>"Ex: Garcia"
            ];
            echo form_input($fi_nom)."<p>".form_error('nom')."</p>";

            //Prénom Contact
            echo $lab_prenom = form_label("Prénom :", "prenom");
            $fi_prenom = [
                "type"  => "text",
                "name"  =>  "prenom",
                "id"    =>  "prenom",
                "value" =>  ($user->prenom()) ? $user->prenom() : set_value('prenom'),
                "placeholder"   =>"Ex: José"
            ];
            echo form_input($fi_prenom)."<p>".form_error('prenom')."</p>";

            //Email Contact
            echo $lab_email = form_label("Votre email :", "email");
            $fi_email = [
                "type"  => "email",
                "name"  =>  "email",
                "id"    =>  "email",
                "value" =>  ($user->email()) ? $user->email() : set_value('email'),
                "placeholder"   =>"Ex: j.garcia@garciaandco.com"
            ];
            echo form_input($fi_email)."<p>".form_error('email')."</p>";

            //Tel Contact
            echo $lab_tel = form_label("Votre Téléphone :", "tel");
            $fi_tel = [
                "type"  => "tel",
                "name"  =>  "tel",
                "id"    =>  "tel",
                "value" =>  ($user->tel()) ? $user->tel() : set_value('tel'),
                "placeholder"   =>"Ex: 0123456789"
            ];
            echo form_input($fi_tel)."<p>".form_error('tel')."</p>";

            //Form button
            $form_button_attr= [
                "type"  => "submit",
                "class" =>  "prev",
                "id"    =>  "form_submit_btn",
                "content"=> "Enregistrer"

            ];
            echo form_button($form_button_attr);

        ?>

		</form>
		
	</article>
	<?php
			$this->layout->view("/esp_inscrit/_menu.php", $this->data);
	?>
</div>