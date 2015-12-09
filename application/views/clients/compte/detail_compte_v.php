<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<div class="row">
    <h1>Détails du compte</h1>
    <hr>

    <div class="large-block-grid-3 medium-block-grid-2 large">
        <h3>Informations personnelles</h3>
        <hr>
                <li><div class="row">
                        <div class="panel clearfix">
                            <h5>Nom : <?=$user['nom']; ?> <?=$user['prenom']; ?><?php if($user['nom']==null && $user['prenom']==null):?> Non renseigné <?php endif?></h5><br>
                            <h5>Login : <?=$user['login']; ?> </h5><br>
                            <h5>Email : <?=$user['email']; ?></h5><br>
                            <h5>Adresse : <?=$user['adresse']; ?><?php if($user['adresse']==null):?> Non renseigné <?php endif?></h5><br>
                            <h5>Code postal :<?=$user['code_postal']; ?><?php if($user['code_postal']==null):?> Non renseigné <?php endif?></h5><br>
                            <h5>Ville :<?=$user['ville']; ?><?php if($user['ville']==null):?> Non renseigné <?php endif?></h5><br>
                        </div>
                    </div>
                </li>
    </div>
    <br>
    <div class="large-block-grid-3 medium-block-grid-2 large">
        <h3>Dernières commandes</h3>
        <hr>
        <?php if($commande == NULL): ?>
            <br>
            <br>
            <br>
            <h4>Votre n'avez passé aucune commande dernièrement !</h4>
        <?php endif; ?>
        <?php if($commande != NULL): ?>
            <table>
                <thead>
                <tr>
                    <td><div class="shrink columns"><h4>Date d'achat</h4></div></td>
                    <td><div class="shrink columns"><h4>Prix de la commande</h4></div></td>
                    <td><div class="shrink columns"><h4>État de la commande</h4></div></td>
                </tr>
                </thead>
                <tbody>
                <?php foreach($commande as $value): ?>
                    <tr>
                        <td><div class="shrink columns"><h5><?=$value->date_achat;?></h5></div></td>
                        <td><div class="shrink columns"><h5><?=$value->prix;?></h5></div></td>
                        <td><div class="shrink columns"><h5><?=$value->libelle;?></h5></div></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
        <br><br>
    </div>
</div>