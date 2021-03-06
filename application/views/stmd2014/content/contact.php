<?php
/**
 * Created by PhpStorm.
 * User: Rumeau
 * Date: 30/11/14
 * Time: 10:10
 */
?>
<div class="clear"></div>
<div class="main">

    <div class="contact_form">
        <header>
            <h1>Nous contacter</h1>            <p>Merci de remplir de formulaire. Nous répondrons à votre demande dans les meilleurs délais.</p>
        </header>
        <?php if($send_mail_status):?>
        <aside class="error">
            <?php echo $send_mail_status; ?>
        </aside>
        <?php endif;?>
        <section>
            <?php
                $form_attr	=	array(
                    "mehtod"	=>	"post",
                    "name"		=>	"contact",
                    "id"		=>	"contact"
                );
                echo form_open("contact/",$form_attr);

                //Nom Contact
                echo $lab_nom = form_label("Nom :", "nom");
                $fi_nom = array(
                    "type"  => "text",
                    "name"  =>  "nom",
                    "id"    =>  "nom",
                    "value" =>  ($nom) ? $nom : set_value('nom'),
                    "placeholder"   =>"Ex: Garcia"
                );
                echo form_input($fi_nom)."<p>".form_error('nom')."</p>";

                echo $lab_prenom = form_label("Prénom :", "prenom");
                $fi_prenom = array(
                    "type"  => "text",
                    "name"  =>  "prenom",
                    "id"    =>  "prenom",
                    "value" =>  ($prenom) ? $prenom : set_value('prenom'),
                    "placeholder"   =>"Ex: José"
                );
                echo form_input($fi_prenom)."<p>".form_error('prenom')."</p>";

                echo $lab_email = form_label("Email :", "email");
                $fi_email = array(
                    "type"  => "email",
                    "name"  =>  "email",
                    "id"    =>  "email",
                    "value" =>  ($email) ? $email : set_value('email'),
                    "placeholder"   =>"Ex: jgarcia@gmail.com"
                );
                echo form_input($fi_email)."<p>".form_error('email')."</p>";

                echo $lab_tel = form_label("Téléphone :", "tel");
                $fi_tel = array(
                    "type"  => "tel",
                    "name"  =>  "tel",
                    "id"    =>  "tel",
                    "value" =>  ($tel) ? $tel : set_value('tel'),
                    "placeholder"   =>"Ex: 0123456789"
                );
                echo form_input($fi_tel)."<p>".form_error('tel')."</p>";

                echo $lab_tel = form_label("Sujet :", "sujet");
                $options = array(
                    'sujet1'  => 'Choisissez ...',
                    'sujet2'  => 'Demande de contact',
                    'sujet3'  => 'Demande d\'informations',
                    'sujet4'  => 'Demande de référencement',
                    'sujet5'  => 'Recherche de prestataires'
                );
                echo form_dropdown('sujet', $options, 'sujet1')."<p>".form_error('sujet')."</p>";

                //Message
            echo form_label("Votre message :", "msg");
            $msg = array(
                "name"  =>  "msg",
                "id"    =>  "msg",
                "class" =>  "countchar",
                "rows"  =>  "10",
                "value" =>  set_value('msg'),
                "placeholder"   =>"",
                "onClick"   =>  ""
            );
            echo form_textarea($msg,$js)."<p>".form_error('msg')."</p>";





            echo form_label("Recopiez le code ci-dessous", "captcha");

            $captcha_text = array(
                "name"  =>  "captcha",
                "id"    =>  "captcha",
                "type"  =>  "text",
                "rows"  =>  "10",
                "placeholder"   =>"",
                "onClick"   =>  ""
            );
                echo form_input($captcha_text)."<p>".form_error('captcha')."</p>";echo $captcha["image"];
?>
            <div class="clear"></div><?php


                  //Form button
                  $form_button_attr= array(
                      "type"  => "submit",
                      "class" =>  "valider",
                      "id"    =>  "form_submit_btn",
                      "content"=> "Valider l'inscription"

                  );
                ?>

            <?php echo form_button($form_button_attr); ?>

              <?php echo form_close(); ?>



        </section>


    </div>
</div>












