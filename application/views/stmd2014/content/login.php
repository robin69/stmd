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
  		
  		echo form_open("espace_inscrits/sign_up",$sign_up_attr);
  	?>
  	<form action="<?php echo base_url(); ?>" method="post" name="sign_up" id="sign_up"> 
	  	<label for="nom">Nom</label><input type="text" name="nom" id="nom" value="<?php echo set_value('nom'); ?>"/> <br />
	  	<label for="prenom">Prénom</label><input type="text" name="prenom" id="prenom" value="<?php echo set_value('prenom'); ?>"/> <br />
	  	<label for="email">Email</label><input type="email" name="email" id="email" value="<?php echo set_value('email'); ?>"/> <br />
	  	<label for="tel">Téléphone</label><input type="tel" name="tel" id="tel" value="<?php echo set_value('tel'); ?>" /> <br />
	  	<label for="userpass">Mot de passe</label><input type="text" name="userpass" id="userpass" value=""/> <br />
	  	<label for="passconf">Confirmation</label><input type="text" name="passconf" id="passconf" value=""/> <br />

	  	<div class="clear"></div>
	  	<p class="cgu_agreement"><input type="checkbox" name="accept_cgu_first" id="accept_cgu_first" checked /> <label for="accept_cgu_first">J'ai lu et j'accepte les <a href="">conditions d'utilisation</a> de l'annuaire SolutionTMD.</label>
	  	</p>
	  	<button class="valider" type="submit" >Valider</button>
  <?php
		echo form_close();	
	?>
  </div>
  <div class="clear"></div>

  
</div>
