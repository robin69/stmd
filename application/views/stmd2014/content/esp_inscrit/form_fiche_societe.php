<div class="main">
	
	<article class="main_blocks sect_princ">
		<h1>FICHE : l'entreprise</h1>
		<hr/>

        <p>Les renseignements que inscrivez ici seront visibles par l'ensemble des visiteurs du site. Il s'agit de la personne qui réceptionnera les prise de contact émanant du site.</p>
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
                "id"    =>"form_fiche_societe",
                "name"    =>"form_fiche_societe",
                "class" =>"form_description",
                "method"=>"post",
                "action"=>"#"];
            echo form_open("", $form_attr);

            //Raison sociale
            echo form_label("Raison sociale :", "raison_sociale");
            $raison_sociale = [
                "type"  => "text",
                "name"  =>  "raison_sociale",
                "id"    =>  "raison_sociale",
                "class" =>  "required",
                "value" =>  ($fiche->raison_sociale()) ? $fiche->raison_sociale() : set_value('raison_sociale'),
                "placeholder"   =>""
            ];
            echo form_input($raison_sociale)."<p>".form_error('raison_sociale')."</p>";

            //Adr1
            echo form_label("Adresse 1 :", "adr1");
            $adr1 = [
                "type"  => "text",
                "name"  =>  "adr1",
                "id"    =>  "adr1",
                "class" =>  "required",
                "value" =>  ($fiche->adr1()) ? $fiche->adr1() : set_value('adr1'),
                "placeholder"   =>""
            ];
            echo form_input($adr1)."<p>".form_error('adr1')."</p>";

            //Adr2
            echo form_label("Adresse 2 :", "adr2");
            $adr2 = [
                "type"  => "text",
                "name"  =>  "adr2",
                "id"    =>  "adr2",
                "value" =>  ($fiche->adr2()) ? $fiche->adr2() : set_value('adr2'),
                "placeholder"   =>""
            ];
            echo form_input($adr2)."<p>".form_error('adr2')."</p>";

             //Ville
            echo form_label("Ville :", "ville");
            $ville = [
                "type"  => "text",
                "name"  =>  "ville",
                "id"    =>  "ville",
                "class" =>  "required",
                "value" =>  ($fiche->ville()) ? $fiche->ville() : set_value('ville'),
                "placeholder"   =>""
            ];
            echo form_input($ville)."<p>".form_error('ville')."</p>";

            //cp
            echo form_label("CP :", "cp");
            $cp = [
                "type"  => "text",
                "name"  =>  "cp",
                "id"    =>  "cp",
                "class" =>  "required",
                "value" =>  ($fiche->cp()) ? $fiche->cp() : set_value('cp'),
                "placeholder"   =>""
            ];
            echo form_input($cp)."<p>".form_error('cp')."</p>";


             //Email societe
            echo form_label("Email :", "email_societe");
            $email_societe = [
                "type"  => "email",
                "name"  =>  "email_societe",
                "id"    =>  "email_societe",
                "class" =>  "required",
                "value" =>  ($fiche->email_societe()) ? $fiche->email_societe() : set_value('email_societe'),
                "placeholder"   =>""
            ];
            echo form_input($email_societe)."<p>".form_error('email_societe')."</p>";


            //Tel_societe
            echo form_label("Téléphone :", "tel_societe");
            $tel_societe = [
                "type"  => "tel",
                "name"  =>  "tel_societe",
                "id"    =>  "tel_societe",
                "class" =>  "required",
                "value" =>  ($fiche->tel_societe()) ? $fiche->tel_societe() : set_value('tel_societe'),
                "placeholder"   =>""
            ];
            echo form_input($tel_societe)."<p>".form_error('tel_societe')."</p>";


            //fax
            echo form_label("Fax :", "fax");
            $fax = [
                "type"  => "tel",
                "name"  =>  "fax",
                "id"    =>  "fax",
                "class" =>  "",
                "value" =>  ($fiche->fax()) ? $fiche->fax() : set_value('fax'),
                "placeholder"   =>""
            ];
            echo form_input($fax)."<p>".form_error('fax')."</p>";

            //site
            echo form_label("Site :", "site");
            $site = [
                "type"  => "url",
                "name"  =>  "site",
                "id"    =>  "site",
                "class" =>  "",
                "value" =>  ($fiche->site()) ? $fiche->site() : set_value('site'),
                "placeholder"   =>""
            ];
            echo form_input($site)."<p>".form_error('site')."</p>";


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