   <?php $this->layout->view("_header"); ?>
   <?php $this->layout->view("_menu"); ?>

    <div class="container theme-showcase" role="main">

      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h1>Inscription</h1>
        <p>Processus d'inscription complet</p>
      </div>


	  <section class="sigin">
	  
	  	<div class="col-md-8">
	  			<header>
		  			<h2>Créer un compte</h2>
		  			<p>Pas encore inscrit ? Vous devriez ! Commencez par ouvrir un accès personnel pour accéder gratuitement à toutes les fonctionnalités du site en entrant vos informations ci-dessous.</p>
	  			</header>
  				<?php 
					$args = array(
						"method" => "POST",
						"id"		=>	"sign_in"
					);
					//echo validation_errors();
					echo form_open("forms/sign_in", $args);
					$this->bootstrap->set_form_error_delimiter("danger");
				?>

	  				
	  				<div class="input-group">
	  					
	  					<span class="input-group-addon">Nom</span>
	  					<input type="text" class="form-control" placeholder="" name="nom" id="nom" value="<?php echo set_value('nom'); ?>">
	  				</div>
	  				<?php echo form_error('nom'); ?>

	  				<div class="input-group">
		  				
	  					<span class="input-group-addon">Prénom</span>
	  					<input type="text" class="form-control" placeholder="" name="prenom" value="<?php echo set_value('prenom'); ?>">
	  				</div>
	  				<?php echo form_error('prenom'); ?>
	  				<div class="input-group">
	  					<span class="input-group-addon">@mail</span>
	  					<input type="text" class="form-control" placeholder="" name="email" value="<?php echo set_value('email'); ?>">
	  				</div>
	  				<?php echo form_error('email'); ?>
	  				<div class="input-group">	
	  					<span class="input-group-addon">Téléphone</span>
	  					<input type="text" class="form-control" placeholder="" name="tel" value="<?php echo set_value('tel'); ?>">
	  				</div>
	  				<?php echo form_error('tel'); ?>
	  				<hr />
	  				<div class="input-group">
	  					<span class="input-group-addon">Mot de passe</span>
	  					<input type="password" class="form-control" placeholder="" name="userpass" id="userpass">
	  				</div>
	  				<?php echo form_error('userpass'); ?>
	  				<div class="input-group">	
	  					<span class="input-group-addon">Choisissez un mot de passe</span>
	  					<input type="password" class="form-control" placeholder="" name="userpassconf">
	  				</div>
	  				<?php echo form_error('userpassconf'); ?>
	  				<hr />
	  				
	  				
	  				<div class="input-group">		
				        <input type="checkbox" name="cgu_conf" value="1" <?php echo set_checkbox('cgu_conf', '1'); ?>>
				        <label for="cgu_conf">Je confirme accepter les conditions générales d'utilisation.</label>

				    </div><!-- /input-group -->
				    <?php echo form_error('cgu_conf'); ?>
	  				<button type="submit" class="btn btn-default" form="sign_in">Inscription</button>
	  				
	  			</form>
	  		</div>

	  	<div class="row">
	  		<div class="col-md-4">
	  			<header>
	  				<h2>Déjà inscrit ?</h2>
	  				<p>Connectez-vous à votre espace pour gérer vos informations et celles de votre entreprise</p>
	  			</header>
	  			
	  				<?php 
		  				$args = array(
		  					"method" => "POST",
		  					"id"		=>	"loggin"
		  				);
		  				echo form_open("forms/front_loggin", $args);
	  				?>
	  				<div class="input-group">
	  					<span class="input-group-addon">Identifiant</span>
	  					<input type="text" class="form-control" placeholder="" name="username" size="20">
	  				</div>
	  				<?php echo form_error('username'); ?>
	  				<div class="input-group">
	  					<span class="input-group-addon">Mot de passe</span>
	  					<input type="password" class="form-control" placeholder="****" name="pass">
	  				</div>
	  				<?php echo form_error('pass'); ?>
	  				<button type="submit" class="btn btn-default" form="loggin">Connexion</button>
	  			</form>
	  				  				<hr />
	  				<a href="" />Mot de passe oublié</a>

	  		</div>
	  		
	  		<button class="btn btn-success" type="button"
                    onclick="alert('Strength: ' + $('#userpass').strength('score') + '%, Verdict: ' + $('#userpass').strength('verdict'))">
                Show
            </button>
            <button class="btn btn-danger" type="button"
                    onclick="$('#userpass').val('K21$^akc');$('#userpass').strength('refresh');">Assign
            </button>
	  	</div>
	  </section>
      


    </div> <!-- /container -->

<?php $this->layout->view("_footer"); ?>