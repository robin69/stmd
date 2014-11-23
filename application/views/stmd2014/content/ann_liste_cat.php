
<!--
<div class="banner"> 
	<div id="slides2">
	       <img src="<?php echo base_url("assets/img"); ?>/slider-img.jpg"> <img src="<?php echo base_url("assets/img"); ?>/slider-img2.jpg"> <img src="<?php echo base_url("assets/img"); ?>/slider-img4.jpg"> <img src="<?php echo base_url("assets/img"); ?>/slider-img5.jpg"> <img src="<?php echo base_url("assets/img"); ?>/slider-img6.jpg">
    </div>
</div>
-->
<div class="clear"></div>
<div class="main">
<p class="top_description">
Vous êtes transporteur MD ou assimilé et vous recherchez un prestataire ou un partenaire expert en matières dangereuses pouvant intervenir pour vous et vos clients en votre nom ?<br>Solutions TMD est votre outil privilégié pour trouver tous les prestataires MD dont vous avez besoin. Au-delà de la quantité d’adresse fournie par l’annuaire spécialiste des expéditeurs de marchandises dangereuses, la qualité des adresses qui sont présentées dans nos pages...
</p>
<h1>"Trouver votre spécialiste matière dangereuse</h1>
<div class="container cat_list">
<?php 
	foreach($cats as $cat) :
		if($cat["nbr_fiches"] >= 1) :
?>
			<div class="cat">
				<h3><a href="<?php echo base_url("annuaire/".$domaine); ?>/cat-<?php echo $cat["slug"]; ?>"><span><?php echo $cat["public_name"]; ?> (<?php echo $cat["nbr_fiches"]; ?>)</span></a></h3>
				<p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat.</p>
		
			</div>


<?php endif; endforeach; ?>
</div>
</div>
