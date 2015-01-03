<div class="main">
	
	<article class="main_blocks sect_princ">
		<h1>MON COMPTE : Forfait</h1>
		<hr/>
        <h3>Votre forfait</h3>
        <?php
            if($returned_message){
                ?>
                <div class="alert alert-success" role="alert">
                    <strong>Parfait !</strong> <?php echo $returned_message; ?>
                </div>
            <?php
            }


                if(count($user_forfaits) == 0)
                {
                    ?>
                    Vous n'avez pas sélectionné de forfait. Vous pouvez en choisir un ci-dessous.Vous n'avez pas encore de forfait.
                    <?php
                } else{


                   // var_dump($user_forfaits);


                    ?>
                    <table width="100%" >
                        <thead>
                            <tr>
                                <th >Date de début</th>
                                <th >Date de fin</th>
                                <th >Nom du forfait</th>
                                <th >Durée</th>
                                <th >Tarif annuel</th>
                                <th colspan="2" align="left">Status</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php  foreach($user_forfaits as $key => $forfait){ ?>
                            <tr>
                                <td ><?php echo ($forfait->date_debut) ? $forfait->date_debut : "--"; ?></td>
                                <td ><?php echo ($forfait->date_fin) ? $forfait->date_fin : "--"; ?></td>
                                <td ><?php echo $forfait->libelle; ?></td>
                                <td ><?php echo $forfait->duree; ?> mois</td>
                                <td><?php echo $forfait->tarif; ?> €</td>


                                <?php
                                    //Status du forfait
                                    switch($forfait->status)
                                    {
                                        case "demande"                          :   $libelle_status = "Demande en attente de traitement";
                                            $img    =   base_url("assets/admin")."/images/ball_grey_16.png";
                                            break;
                                        case "forfait_en_attente_reglement"     :   $libelle_status = "Demande acceptée, en attente de règlement";
                                            $img    =   base_url("assets/admin")."/images/ball_yellow_16.png";
                                            break;
                                        case "forfait_en_cours"                 :   $libelle_status = "Forfait actif";
                                            $img    =   base_url("assets/admin")."/images/ball_green_16.png";
                                            break;
                                    }

                                ?>
                                <td>
                                    <img src="<?php echo $img; ?>" />
                                </td>
                                <td>

                                        <?php echo $libelle_status; ?>

                                </td>

                            </tr>
                        <?php }  ?>
                        </tbody>


                    </table>
                    <?php

                }

        ?>

        <hr />
        <br />
        <br />
        <br />
        <h3>Vous souhaitez plus de visibilité ?</h3>
        <h4> Comparez avec nos autres forfaits </h4>
        <p>
            <a class="select_offer" href="<?php echo base_url("choisir-sa-griffe"); ?>" >Voir les forfaits >></a>
        </p>

        <!--<table>
            <thead>
            </thead>
            <tbody>
                <?php /*foreach ( $all_forfaits as $key => $forf) :

                    //var_dump($forf);


                    */?>
                <tr>
                    <th>
                        <?php /*echo $forf->libelle; */?>
                    </th>
                    <td><?php /*echo $forf->description; */?></td>
                    <td><?php /*echo $forf->duree; */?>&nbsp;mois</td>
                    <td><?php /*echo number_format($forf->tarif,2,"."," "); */?>&nbsp;€</td>
                    <td><a href="<?php /*echo base_url("choisir-sa-griffe"); */?>">En&nbsp;savoir&nbsp;+ </a></td>
                    <td><a class="forfait_select" href="<?php /*echo base_url("espace_inscrits"); */?>/select_forfait/?id_user=<?php /*echo $this->session->userdata("id_user");*/?>&id_forfait=<?php /*echo $forf->id; */?>" onclick="return false;">Demander ce forfait</a></td>
                </tr>
                <?php /*endforeach; */?>
            </tbody>
        </table>-->
	</article>
	
		<?php
			$this->layout->view("/esp_inscrit/_menu.php", $this->data);
		?>
	
</div>