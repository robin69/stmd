<div class="main">
	
	<article class="main_blocks sect_princ">
		<h1>FICHE : Contact</h1>
		
		<hr/>
		<p>Les renseignements que inscrivez ici seront visibles par l'ensemble des visiteurs du site. Il s'agit de la personne qui réceptionnera les prise de contact émanant du site.</p>
		<form action="" method="post" name="" id="" class="form_description">
			<label for="nom_contact">Nom:</label>
			<input type="text" name="nom_contact" id="nom_contact" placeholder="" value="" />
			<p><strong>*</strong>Non-visible sur le site.</p>

			<label for="prenom_contact">Prénom:</label>
			<input type="text" name="prenom_contact" id="prenom_contact" placeholder="" value="" />
			<p><strong>*</strong>Non-visible sur le site.</p>
			
			<label for="email_contact">Votre email:</label>
			<input type="email" name="email_contact" id="email_contact" placeholder="ex. : jose.garcia@gmail.com" value="" />
			<p><strong>*</strong>Non-visible sur le site.</p>
			
			<label for="tel_contact">Votre téléphone:</label>
			<input type="tel" name="tel_contact" id="tel_contact" placeholder="ex. : 06 12 34 45 67" value="" />
			<p><strong>*</strong>Non-visible sur le site.</p>
			<div class="clear"></div>
			<button type="submit" class="prev">Enregistrer</button>
		</form>

	</article>
	
		<?php
			$this->layout->view("/esp_inscrit/_menu.php", $this->data);
		?>
	
</div>