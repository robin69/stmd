<div class="main classement_form">
	
	<article class="main_blocks sect_princ">
		<h1>FICHE : Classement</h1>
		<hr/>
		<form action="" method="post" name="" id="" class="">
		<section class="form_type">
			<h3>Sélectionner le type d'activité</h3>
			
				<ul>
				<?php 
				$i=0;
				foreach($types as $type)
				{
					?>
					<li><input id="type_<?php echo $type->slug; ?>" class="type" type="checkbox" name="type['<?php echo $type->slug; ?>']"> <label for="type_<?php echo $type->slug; ?>"><?php echo $type->public_name; ?></label></li>
					<?php
					$i++;
				}?>
				</ul>
			
		</section><!-- EOF .form_type -->
		
		<?php
		foreach ($types as $type)
		{
			//On récupère les catégories
			$c = new Category;
			$cats = $c->get_cat_by_type($type->slug, FALSE);
			
			?>
			<section class="cat_sel_<?php echo $type->slug; ?>">
				<h3>Sélectionnez les catégories de type <?php echo $type->public_name; ?></h3>
				<ul>
				<?php foreach($cats as $cat) : ?>
					<li><input id="cat_<?php echo $cat["id_category"]; ?>" class="" type="checkbox" name="cat['<?php echo $cat["id_category"]; ?>']"> <label for="cat_<?php echo $cat["id_category"]; ?>"><?php echo $cat["public_name"]; ?></label>
						<?php	
						$ss_cats = $c->get_child($cat["id_category"]);
						if(count($ss_cats)>=1):
							?>
							<ul class="ss_cat">
								<?php foreach($ss_cats as $ss_cat): ?>
									<li><input id="sscat_<?php echo $ss_cat->id_category; ?>" class="" type="checkbox" name="cat['<?php echo $ss_cat->id_category; ?>']"> <label for="sscat_<?php echo $ss_cat->id_category; ?>"><?php echo $ss_cat->public_name; ?></label></li>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?> 
						<ul>
							<li>toto</li>
						</ul>
					</li> 
				<?php endforeach; ?>
				</ul>

			</section>
			<div class="clear"></div>
			<?php
			
		}
		?></form>
	</article>
	
		<?php
			$this->layout->view("/esp_inscrit/_menu.php", $this->data);
		?>
	
</div>