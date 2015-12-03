<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row">
    <h1>Détails Commande</h1>
    <table class="large-centered">
        <caption><h3>Produits dans la Commande</h3></caption>
        <thead>
        <tr>
            <td><div class="shrink columns"><h4>Quantité</h4></div></td>
            <td><div class="shrink columns"><h4>Nom</h4></div></td>
            <td><div class="shrink columns"><h4>Type</h4></div></td>
            <td><div class="shrink columns"><h4>Photo</h4></div></td>
            <td><div class="shrink columns"><h4>Prix</h4></div></td>
            <td><div class="shrink columns"><h4>Data d'ajout</h4></div></td>
        </tr>
        </thead>
        <tbody>
        <?php foreach($commande as $value): ?>
            <tr>
                <td><div class="shrink columns"><h4><?=$value->quantite?></h4></div></td>
                <td><div class="shrink columns"><h5><?=$value->nom?></h5></div></td>
                <td><div class="shrink columns"><h5><?=$value->libelle?></h5></div></td>
                <td><div class="columns"><img style="width:40px;height:40px" src="<?=base_url();?>images/<?=$value->photo; ?>" alt="image de <?=$value->libelle; ?>"></div></td>
                <td><div class="shrink columns"><h5><?=$value->prix?></h5></div></td>
                <td><div class="shrink columns"><h5><?=$value->dateAjoutPanier?></h5></div></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <a class="right" href="<?=site_url('Commande_c');?>" >Retour</a>
</div>