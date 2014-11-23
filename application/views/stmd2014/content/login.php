a<div class="main">
	
  <h1>Accès à votre espace.</h1>
  <div class="sign_in_form">
  	<header>
  		<h3>Connectez-vous à votre compte</h3>
  		<p>vous disposez déjà d'un compte, entrez votre identifiant et votre mot de passe pour accéder à votre espace personnel.</p>
  	</header>

  	<?php
  		$sign_in_attr	=	array(
  			"mehtod"	=>	"post",
  			"name"		=>	"sign_in",
  			"id"		=>	"sign_in"
  		);
  		echo form_open("login/connexion",$sign_in_attr);
  	?>
<!--   	<form method="post" name="sign_in" id="sign_in" action="<?php echo base_url("login/connexion"); ?>" >  -->
	  	<label for="email_signin">Email</label><input type="email" name="email" id="email_signin"/> <br />
	  	<label for="userpass">Mot de passe</label><input type="password" name="userpass" id="userpass"/> <br />
	  	<p class="cgu_agreement"><input type="checkbox" name="cookie_set" id="cookie_set" /> <label for="cookie_set">Garder ma session ouverte sur cet ordinateur.</label>
	  	<div class="clear"></div>
	  	<button class="valider" type="submit">Valider</button>
<!--   	</form> -->

	<?php
		echo form_close();	
	?>
  	<footer>
  		<p><a class="forgot-password" href="login.html#">Mot de passe oublier</a></p>
  	</footer>
  </div>
  <div class="sign_in_form">
  	<header>
  		<h3>Créez votre compte</h3>
  		<p>Vous ne disposez pas encore d'un compte et vous souhaitez pouvoir inscrire votre activité dans l'annuaire, créez votre compte en saisissant et validant les informations ci-dessous puis suivez les indications qui vous seront envoyées par email.</p>
  	</header>
  	<?php
  		if(validation_errors() != "")
  		{
  			
	  		?>
	  		
	  		<div class="ui-widget">
	  		<div class="ui-state-error ui-corner-all scroll-down-to" style="padding: 0 .7em;">
				<p>
					<span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span>
					<strong>Alert:</strong> <?php echo validation_errors(); ?>
				</p>
			</div>
	  		</div>
	  		<?php
  		}else if(isset($success) AND $success== TRUE){
	  		?>
	  		<div class="ui-widget">
		  		<div class="ui-state-ok ui-corner-all scroll-down-to" style="padding: 0 .7em;">
					<p>
						<span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span>
						<strong>Parfait :</strong> <?php echo $success_message; ?>
					</p>
				</div>
	  		</div>
	  		<?php
  		}
  		
  		$sign_up_attr	=	array(
  			"mehtod"	=>	"post",
  			"name"		=>	"sign_up",
  			"id"		=>	"sign_up"
  		);
  		
  		echo form_open("login/sign_up",$sign_up_attr);
  	?>

      <?php
  		$sign_up_attr	=	array(
            "mehtod"	=>	"post",
            "name"		=>	"sign_up",
            "id"		=>	"sign_up"
        );
  		echo form_open("login/signup",$sign_up_attr);


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

          echo $lab_pass = form_label("Mot de passe :", "userpass");
          $fi_userpass = array(
              "type"  => "password",
              "name"  =>  "userpass",
              "id"    =>  "userpass",
              "placeholder"   =>""
          );
          echo form_input($fi_userpass)."<p>".form_error('userpass')."</p>";

           echo $lab_passconf = form_label("Confirmation :", "passconf");
          $fi_passconf = array(
              "type"  => "password",
              "name"  =>  "passconf",
              "id"    =>  "passconf",
              "placeholder"   =>""
          );
          echo form_input($fi_passconf)."<p>".form_error('passconf')."</p>";

  	?>
     <div class="clear"></div>
    <p class="cgu_agreement">
        <?php
            $fi_cgu_agreement = array(
                "type"  => "checkbox",
                "name"  =>  "accept_cgu_first",
                "id"    =>  "accept_cgu_first",
                "value" =>  TRUE
            );
            echo form_input($fi_cgu_agreement) . form_error('accept_cgu_first') ;
            echo $la_cgu_agreement = form_label(" J'ai lu et j'accepte les <a href=''>conditions d'utilisation</a> de l'annuaire SolutionTMD.", "accept_cgu_first");
        ?>

    </p>
  <?php

      //Form button
      $form_button_attr= array(
          "type"  => "submit",
          "class" =>  "valider",
          "id"    =>  "form_submit_btn",
          "content"=> "Valider l'inscription"

      );
      echo form_button($form_button_attr);

		echo form_close();	
	?>
  </div>
  <div class="clear"></div>

  
</div>
