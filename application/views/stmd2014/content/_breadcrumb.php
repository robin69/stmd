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
	<div class="fil_ariane" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
		<p>Vous êtes ici : 
			<?php
				foreach($breadcrumb as $name => $link)
				{
					if($i!=0){ echo " > "; }
					?>
					<a href="<?php echo $link; ?>" itemprop="url"><span itemprop="title"><?php echo $name; ?></span></a>
					<?php
					$i++;
				}
		?>
		</p>
	</div>
	<div class="clear"></div><?php 
	endif; 

