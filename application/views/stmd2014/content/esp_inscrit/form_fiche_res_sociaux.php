<div class="main">
	
	<article class="main_blocks sect_princ">
		<h1>FICHE : Réseaux sociaux</h1>
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
                "id"    =>"form_fiche_reseaux",
                "name"    =>"form_fiche_reseaux",
                "class" =>"form_description",
                "method"=>"post",
                "action"=>"#");
            echo form_open("", $form_attr);

            //Facebook
            echo form_label("Facebook :", "facebook");
            $facebook = array(
                "type"  =>  "url",
                "name"  =>  "facebook",
                "id"    =>  "facebook",
                "class" =>  "",
                "value" =>  ($fiche->facebook()) ? $fiche->facebook() : set_value('facebook'),
                "placeholder"   =>"http://"
            );
            echo form_input($facebook)."<p>".form_error('facebook')."</p>";


            //Twitter
            echo form_label("Twitter :", "twitter");
            $twitter = array(
                "type"  =>  "url",
                "name"  =>  "twitter",
                "id"    =>  "twitter",
                "class" =>  "",
                "value" =>  ($fiche->twitter()) ? $fiche->twitter() : set_value('twitter'),
                "placeholder"   =>"http://"
            );
            echo form_input($twitter)."<p>".form_error('twitter')."</p>";


            //Google+
            echo form_label("Google+ :", "googleplus");
            $googleplus = array(
                "type"  =>  "url",
                "name"  =>  "googleplus",
                "id"    =>  "googleplus",
                "class" =>  "",
                "value" =>  ($fiche->googleplus()) ? $fiche->googleplus() : set_value('googleplus'),
                "placeholder"   =>"http://"
            );
            echo form_input($googleplus)."<p>".form_error('googleplus')."</p>";


            //Viadeo
            echo form_label("Viadeo :", "viadeo");
            $viadeo = array(
                "type"  =>  "url",
                "name"  =>  "viadeo",
                "id"    =>  "viadeo",
                "class" =>  "",
                "value" =>  ($fiche->viadeo()) ? $fiche->viadeo() : set_value('viadeo'),
                "placeholder"   =>"http://"
            );
            echo form_input($viadeo)."<p>".form_error('viadeo')."</p>";


            //LinkedIn
            echo form_label("LinkedIn :", "linkedin");
            $linkedin = array(
                "type"  =>  "url",
                "name"  =>  "linkedin",
                "id"    =>  "linkedin",
                "class" =>  "",
                "value" =>  ($fiche->linkedin()) ? $fiche->linkedin() : set_value('linkedin'),
                "placeholder"   =>"http://"
            );
            echo form_input($linkedin)."<p>".form_error('linkedin')."</p>";


            //Form button
            $form_button_attr= array(
                "type"  => "submit",
                "class" =>  "prev",
                "id"    =>  "form_submit_btn",
                "content"=> "Enregistrer"

            );
            echo form_button($form_button_attr);


            form_close();

        ?>
	</article>
	
		<?php
			$this->layout->view("/esp_inscrit/_menu.php", $this->data);
		?>
	
</div>