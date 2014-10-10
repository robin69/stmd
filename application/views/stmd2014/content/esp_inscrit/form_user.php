<div class="main">
	
	<article class="main_blocks sect_princ">
		<h1>MON COMPTE : Profil</h1>
		<hr/>
		<form action="" method="post" name="fiche_infos_generales" id="" class="form_description">
			<label for="nom">Nom:</label>
			<input type="text" name="nom" id="nom" placeholder="" value="" />
			<p><strong>*</strong>Non-visible sur le site.</p>

			<label for="prenom">Prénom:</label>
			<input type="text" name="prenom" id="prenom" placeholder="" value="" />
			<p><strong>*</strong>Non-visible sur le site.</p>
			
			<label for="email">Votre email:</label>
			<input type="email" name="email" id="email" placeholder="ex. : jose.garcia@gmail.com" value="" />
			<p><strong>*</strong>Non-visible sur le site.</p>
			
			<label for="tel">Votre téléphone:</label>
			<input type="tel" name="tel" id="tel" placeholder="ex. : 06 12 34 45 67" value="" />
			<p><strong>*</strong>Non-visible sur le site.</p>
			<div class="clear"></div>
			<button type="submit" class="prev">Enregistrer</button>
		</form>
		
	</article>
	<?php
			$this->layout->view("/esp_inscrit/_menu.php", $this->data);
	?>
</div>