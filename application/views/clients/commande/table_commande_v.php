<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row">
    <h1>Récapitulatif des commandes</h1>
    <?php if($commande == NULL): ?>
        <br>
        <br>
        <br>
        <h4>Votre n'avez passé aucune commande dernièrement !</h4>
    <?php endif; ?>
    <?php if($commande != NULL): ?>
        <table>
            <caption><h3>Commandes effectuées</h3></caption>
            <thead>
            <tr>
                <td><div class="shrink columns"><h4>Date d'achat</h4></div></td>
                <td><div class="shrink columns"><h4>Prix de la commande</h4></div></td>
                <td><div class="shrink columns"><h4>État de la commande</h4></div></td>
                <td><div class="shrink columns"><h4>Options</h4></div></td>
            </tr>
            </thead>
            <tbody>
            <?php foreach($commande as $value): ?>
                <tr>
                    <td><div class="shrink columns"><h5><?=$value->date_achat;?></h5></div></td>
                    <td><div class="shrink columns"><h5><?=$value->prix;?></h5></div></td>
                    <td><div class="shrink columns"><h5><?=$value->libelle;?></h5></div></td>
                    <td><div class="shrink columns"><h5><a href="" >Détail de la commande</a></h5></div></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>