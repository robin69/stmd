
<div id="dt_reglement_form" title="règlement de l'abonnement">
	<p class="infos"></p>

	<form>
		<label for="dt_reglement">Date de règlement</label>
		<?php
			if ($fiche->date_reglement() == "0")
			{
				$date = date("d/m/Y");
			}else{
				$date = date("d/m/Y", $fiche->date_reglement());
			}
		?>
		<input type="text" name="dt_reglement" id="dt_reglement_field" value="<?php echo $date; ?>" class="text ui-widget-content ui-corner-all">
		</fieldset>
	</form>
</div>

