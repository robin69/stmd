<?php
/**
 * Liste des demandes de changement de forfait
 * en attente de modération
 *
 * Created by PhpStorm.
 * User: Rumeau
 * Date: 28/02/15
 * Time: 17:05
 */
?>
<div class="main pagesize">
    <div class="main-wrap">
        <div class="page clear">
            <h1><?php echo $page_title; ?></h1>
            <h2><?php echo $sub_title; ?></h2>
            <p>&nbsp;</p>
            <div class="columns clear"></div>

            <div class="content-box">
                <div class="box-body">
                    <div class="box-header clear">
                        <h2><?php echo $moderation_list_title; ?></h2>
                    </div>

                    <div class="box-wrap clear">

                        <div id="data-table">
                            <table class="style1">
                                <thead>
                                    <tr>
                                        <th>Date demande</th>
                                        <th>Renouvellement ?</th>
                                        <th>Nom</th>
                                        <th>Téléphone</th>
                                        <th>Email</th>
                                        <th>Forfait demandé</th>
                                        <th>Prix / duréee</th>
                                        <th>Outils</th>
                                    </tr>
                                </thead>

                                <tbody>
                                <?php foreach($demmande_changement_forfait as $demande):
                                    $date_demande = new DateTime($demande->date_demande);
                                    $date_demande->format("d m Y");


                                    ?>
                                    <tr>
                                        <td><?php echo $date_demande->format("d m Y"); ?></td>
                                        <td><?php echo ($date_demande->renouvel_from != null) ? "OUI" : "--"; ?></td>
                                        <td><?php echo ucfirst($demande->prenom) . " ". ucfirst($demande->nom); ?></td>
                                        <td><?php echo $demande->tel; ?></td>
                                        <td><?php echo $demande->email; ?></td>
                                        <td><?php echo $demande->libelle; ?></td>
                                        <td><?php echo number_format($demande->tarif,2,".", " ") ." € /".$demande->duree." mois"; ?></td>
                                        <td>
                                            <a class="button" href="<?php echo base_url('admin/moderation/mod_forfait/'.$demande->id_demande.'/accepter');?>">Accepter</a>
                                            <a class="button" href="<?php echo base_url('admin/moderation/mod_forfait/'.$demande->id_demande.'/refuser');?>">Refuser</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>