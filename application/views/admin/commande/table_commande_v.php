<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row">
    <h1>Récapitulatif des commandes :</h1>
    <?php if($commande == NULL): ?>
        <br>
        <br>
        <br>
        <h4>Il n'y a aucune commande !</h4>
    <?php endif; ?>
    <?php if($commande != NULL): ?>
        <table>
            <caption><h3>Commandes</h3></caption>
            <thead>
            <tr>
                <td><div class="shrink columns"><h4>Client</h4></div></td>
                <td><div class="shrink columns"><h4>Date d'achat</h4></div></td>
                <td><div class="shrink columns"><h4>Prix de la commande</h4></div></td>
                <td><div class="shrink columns"><h4>État de la commande</h4></div></td>
                <td><div class="shrink columns"><h4>Options</h4></div></td>
            </tr>
            </thead>
            <tbody>
            <?php foreach($commande as $value): ?>
                <tr>
                    <td><div class="shrink columns"><h5><?=$value->login;?></h5></div></td>
                    <td><div class="shrink columns"><h5><?=$value->date_achat;?></h5></div></td>
                    <td><div class="shrink columns"><h5><?=$value->prix;?></h5></div></td>
                    <td><div class="shrink columns"><h5><?=$value->libelle;?></h5></div></td>
                    <td>
                        <?php if($value->id_etat == 1): ?>
                        <div class="shrink columns"><h5><a href="<?=site_url('Commande_c/validerCommande')."/".$value->id_commande;?>">Préparer</a></h5></div>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>