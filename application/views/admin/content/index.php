
<div class="breadcrumb">
	<div class="bread-links pagesize">
		<ul class="clear">
		<li class="first">You are here:</li>
		<li><a href="#">Dashboard</a></li>
		</ul>
	</div>
</div>
	
<div class="main pagesize"> <!-- *** mainpage layout *** -->
	<div class="main-wrap">
		<div class="page clear">
			
			<!-- ICONBAR -->
			<!--<div class="content-box clear">
			<div class="box-body iconbar">
				<div class="box-wrap">
				<div class="main-icons" id="iconbar">
					<ul class="clear">
		                        <li><a href="#"><img src="<?php /*echo base_url("assets/admin"); */?>/images/ico_folder_64.png" class="icon" alt="" /><span class="text">Create an Article</span></a></li>
		                        <li><a href="#"><img src="<?php /*echo base_url("assets/admin"); */?>/images/ico_page_64.png" class="icon" alt="" /><span class="text">Add Page</span></a></li>
                		        <li><a href="#"><img src="<?php /*echo base_url("assets/admin"); */?>/images/ico_picture_64.png" class="icon" alt="" /><span class="text">Add Picture</span></a></li>
		                        <li><a href="#"><img src="<?php /*echo base_url("assets/admin"); */?>/images/ico_clock_64.png" class="icon" alt="" /><span class="text">Add Event</span></a></li>
                		        <li><a href="#"><img src="<?php /*echo base_url("assets/admin"); */?>/images/ico_users_64.png" class="icon" alt="" /><span class="text">Users</span></a></li>
		                        <li><a href="#"><img src="<?php /*echo base_url("assets/admin"); */?>/images/ico_settings_64.png" class="icon" alt="" /><span class="text">Settings</span></a></li>
		                        <li><a href="#modal" class="modal-link"><img src="<?php /*echo base_url("assets/admin"); */?>/images/ico_chat_64.png" class="icon" alt="" /><span class="text">Open Modal</span></a></li>
                		        <li><a href="#"><img src="<?php /*echo base_url("assets/admin"); */?>/images/ico_folder_64.png" class="icon" alt="" /><span class="text">Create an Article</span></a></li>
                        		<li class="active"><a href="#"><img src="<?php /*echo base_url("assets/admin"); */?>/images/ico_page_64.png" class="icon" alt="" /><span class="text">Active icon</span></a></li>
		                        <li><a href="#"><img src="<?php /*echo base_url("assets/admin"); */?>/images/ico_picture_64.png" class="icon" alt="" /><span class="text">Add Picture</span></a></li>
                		        <li><a href="#"><img src="<?php /*echo base_url("assets/admin"); */?>/images/ico_clock_64.png" class="icon" alt="" /><span class="text">Add Event</span></a></li>
					</ul>
				</div>
				</div>
			</div>
			</div>-->
			
			<!-- MODAL WINDOW -->
			<div id="modal" class="modal-window modal-600">
				
				<div class="notification note-info">
					<a href="#" class="close" title="Close notification"><span>close</span></a>
					<span class="icon"></span>
					<p><strong>Information:</strong> The examples of modal windows are set on the LABELS in H1 tags.</p>
				</div>
				
				<h2>Modal Window : size 600</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec tristique, lorem id hendrerit sodales, nisl felis sollicitudin lacus, et facilisis felis quam at quam. Nullam vel nunc at sapien sagittis feugiat. Vestibulum est eros, condimentum ac sodales vel, iaculis vitae neque.</p>
				<h4 class="bt-space10">You can set the 4 types of modal:</h4>
				<div class="clear">
					<div class="half fl">
					<div class="mark bt-space5">
						<ul class="standard clean-padding bt-space10">
						<li><span class="fr">class "modal-400"</span> <span><strong>Size 400px</strong></span></li>
						<li><span class="fr">class "modal-600"</span> <span><strong>Size 600px</strong></span></li>
						<li><span class="fr">class "modal-800"</span> <span><strong>Size 800px</strong></span></li>
						<li><span class="fr">no other class</span> <span><strong>Size undefined (auto)</strong></span></li>
						</ul>
					</div>
					</div>
					<p class="half fr"><small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec tristique, lorem id hendrerit sodales, nisl felis sollicitudin lacus, et facilisis felis quam at quam.</small></p>
				</div>
			</div>
			
			<!-- CONTENT BOXES -->
			
			<div class="columns clear bt-space20">
				<!-- DASHBOARD - LEFT COLUMN -->

						
					<h1>Tableau de bord <!--<a href="#modal-label" class="label modal-link">INFO</a>--></h1>
					<p>Bienvenue dans le tableau de bord de l'interface d'administration STMD. Vous trouverez ci-dessous la liste complète des informations qui nécessitent votre intervention.</p>


					<div class="columns clear">
						<div class="col1-2">
						
							<!-- OVERVIEW - BASIC TABLE -->
							<h2>Informations importantes</h2>
							<table class="basic" cellspacing="0">
							<tbody>
							<tr>
                                <?php
                                    if(COUNT($fiches_a_moderer)==0){

                                        $fm_img = "ball_green_16.png";
                                    }else{
                                        $fm_img = "ball_yellow_16.png";
                                    }


                                    if(COUNT($fiches_att_paiement)==0){

                                        $fatt_img = "ball_green_16.png";
                                    }else{
                                        $fatt_img = "ball_yellow_16.png";
                                    }


                                if(COUNT($demmande_changement_forfait)==0){

                                        $fdem_img = "ball_green_16.png";
                                    }else{
                                    $fdem_img = "ball_yellow_16.png";
                                    }



                                    ?>
								<td><img src="<?php echo base_url("assets/admin"); ?>/images/<?php echo $fm_img; ?>" class="block" alt="" /></td>
								<th class="full">Fiches à modérer</th>
								<td class="value right"><?php echo COUNT($fiches_a_moderer); ?></td>
								<td><a href="<?php echo base_url("admin");?>/inscrits/liste/filter_name/temp/filter_value/1">Voir</a></td>
							</tr>
							<tr>
								<td><img src="<?php echo base_url("assets/admin"); ?>/images/<?php echo $fatt_img; ?>" class="block" alt="" /></td>
								<th>Fiches en attente de règlement</th>
								<td class="value right"><?php echo COUNT($fiches_att_paiement); ?></td>
								<td><a href="#">Voir</a></td>
							</tr>
                            <tr>
                                <td><img src="<?php echo base_url("assets/admin"); ?>/images/<?php echo $fdem_img; ?>" class="block" alt="" /></td>
                                <th>Demande de changement de forfait</th>
                                <td class="value right"><?php echo COUNT($demmande_changement_forfait); ?></td>
                                <td><a href="#">Voir</a></td>
                            </tr>

							</tbody>
							</table>
						
						</div>
						<div class="col1-2 lastcol">

							<!-- MESSAGES - BASIC TABLE -->
							<h2>Fiches périmées ou en période d'alerte</h2>
                            <p><small><strong>Note:</strong> Les fiches présentées ci-dessous sont des fiches payantes qui sont périmées (<img src="<?php echo base_url("assets/admin"); ?>/images/ball_red_16.png" />) ou qui approche de leur dates de péremption (<img src="<?php echo base_url("assets/admin"); ?>/images/ball_yellow_16.png" />).</small></p>
                            <table class="basic" cellspacing="0">
                                <tbody>
                            <?php
                                list($year,$month,$day,$hour,$minute,$secondes) = explode("-",date("Y-m-d-h-i-s"));
                                $date_perimee = mktime($hour,$minute,$secondes,$month-12,$day,$year);
                                $date_debut_warning = mktime($hour,$minute,$secondes,$month-12,$day+30,$year);
                                if($fiche->date_reglement < $date_perimee)
                                {
                                    $img_color  =   "ball_red_16.png";
                                }elseif($fiche->date_reglement >= $date_perimee AND $fiche->date_reglement <= $date_debut_warning){
                                    $img_color  =    "ball_yellow_16.png";
                                }

                                foreach($warning_periode as $key => $fiche)
                                {

                                   // var_dump($fiche);
                                    ?>
                                    <tr>
                                        <th><?php echo date("d/m/Y", $fiche->date_reglement); ?></th>
                                        <td class="full"><a href="<?php echo base_url("admin/inscrits")."/edit_fiche_infos/".$fiche->id_fiche; ?>" ><?php echo $fiche->raison_sociale; ?></a></td>
                                        <td><img src="<?php echo base_url("assets/admin"); ?>/images/<?php echo $img_color; ?>" class="block cr-help" /></td>
                                        <td></td>
                                    </tr>

                            <?php


                                }

                             ?>


							</tbody>
							</table>

						</div>
					</div>
					

				

			</div>
			
			

			
		</div><!-- end of page -->
	</div>
</div>
