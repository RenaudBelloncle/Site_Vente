<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="row">
    <table>
        <caption>Recapitulatifs des Commandes</caption>
        <thead>
        <tr>
            <th>Client</th>
            <th>Lieu de livraison</th>
            <th>Prix</th>
            <th>Date d'achat</th>
            <th>Etat</th>
            <th>Opération</th>
        </tr>
        </thead>
        <tbody>
        <?php if( $commandes != NULL): ?>
            <?php foreach ($commandes as $value): ?>
                <tr>
                    <td><?=$value->nom." ".$value->prenom;?></td>
                    <td><?=$value->id_lieu;?></td>
                    <td><?=$value->prix;?></td>
                    <td><?=$value->date_achat;?></td>
                    <td><?=$value->libelle;?></td>
                    <td>
                        <a href="">Préparer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        <tbody>
    </table>
</div>
<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>