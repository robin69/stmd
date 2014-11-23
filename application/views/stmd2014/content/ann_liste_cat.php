
<!--
<div class="banner"> 
	<div id="slides2">
	       <img src="<?php echo base_url("assets/img"); ?>/slider-img.jpg"> <img src="<?php echo base_url("assets/img"); ?>/slider-img2.jpg"> <img src="<?php echo base_url("assets/img"); ?>/slider-img4.jpg"> <img src="<?php echo base_url("assets/img"); ?>/slider-img5.jpg"> <img src="<?php echo base_url("assets/img"); ?>/slider-img6.jpg">
    </div>
</div>
-->
<div class="clear"></div>
<div class="main">
<p class="top_description"><?php echo $description; ?></p>
<!--<h1>"Trouver votre spécialiste matière dangereuse</h1>-->
<div class="container cat_list">
<?php 
	foreach($cats as $cat) :
		if($cat["nbr_fiches"] >= 1) :
?>
			<div class="cat">
				<h3><a href="<?php echo base_url("annuaire/".$type_guid); ?>/cat-<?php echo $cat["slug"]; ?>"><span><?php echo $cat["public_name"]; ?> (<?php echo $cat["nbr_fiches"]; ?>)</span></a></h3>
				<p><?php echo $cat["description"]; ?></p>
		
			</div>


<?php endif; endforeach; ?>
</div>
</div>
