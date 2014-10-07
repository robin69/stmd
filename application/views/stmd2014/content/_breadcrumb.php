<?php
	/******************* FIL D'ARIANNE *************************
	*
	*	Dans le contrôller la variable est donnée sous la forme
	*	 $this->data["breadcrumb"] = array( "label_lien" => "lien", "label_lien" => "lien");
	*	et envoyée à la vue.
	*
	*
	*/
	$i=0;
	if(isset($breadcrumb)) :
	?>
	<div class="fil_ariane">
		<p>Vous êtes ici : 
			<?php
				foreach($breadcrumb as $name => $link)
				{
					if($i!=0){ echo " > "; }
					?>
					<a href="<?php echo base_url().$link; ?>" ><?php echo $name; ?></a>
					<?php
					$i++;
				}
		?>
		</p>
	</div>
	<div class="clear"></div><?php 
	endif; 

