<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row">
    <h1>Panier</h1>
    <?php if($panier == NULL): ?>
        <br>
        <br>
        <br>
        <h4>Votre panier est vide !</h4>
    <?php endif; ?>
    <?php if($panier != NULL): ?>
    <table class="large-centered">
        <caption><h3>Produits dans le Panier</h3></caption>
        <thead>
        <tr>
                <td><div class="shrink columns"><h4>Quantité</h4></div></td>
                <td><div class="shrink columns"><h4>Nom</h4></div></td>
                <td><div class="shrink columns"><h4>Type</h4></div></td>
                <td><div class="shrink columns"><h4>Photo</h4></div></td>
                <td><div class="shrink columns"><h4>Prix</h4></div></td>
                <td><div class="shrink columns"><h4>Data d'ajout</h4></div></td>
                <td><div class="shrink columns"><h4>Opération</h4></div></td>
            </tr>
        </thead>
        <tbody>
                <?php foreach($panier as $value): ?>
                    <tr>
                        <td><div class="shrink columns">
                            <h4><a href="<?=site_url("Panier_c/delQuantite")."/".$value->id_panier;?>" >-</a>
                            <?=$value->quantite?>

                                <?php foreach($produit as $val): ?>
                                <?php if($val->stock > $value->quantite && $val->id== $value->id_produit): ?>
                                    <a href="<?=site_url("Panier_c/addQuantite")."/".$value->id_panier."/1";?>" >+</a></h4>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            </div></td>
                       <td> <div class="shrink columns"><h5><?=$value->nom?></h5></div></td>
                        <td><div class="shrink columns"><h5><?=$value->libelle?></h5></div></td>
                        <td><div class="columns"><img style="width:40px;height:40px" src="<?=base_url();?>images/<?=$value->photo; ?>" alt="image de <?=$value->libelle; ?>"></div></td>
                        <td><div class="shrink columns"><h5><?=$value->prix?></h5></div></td>
                        <td><div class="shrink columns"><h5><?=$value->dateAjoutPanier?></h5></div></td>
                        <td>
                            <h5><a href="<?=site_url("Panier_c/deleteProduit")."/".$value->id_panier;?>" >Supprimer</a></h5>
                        </td>
                    </tr>
                <?php endforeach; ?>
        </tbody>
    </table>
    <a class="left" href="<?=site_url("Panier_c/validerCommande");?>" >Valider la commande</a>
        <a class="right" href="<?=site_url("Panier_c/viderPanier");?>" >Vider le panier</a>
    <?php endif; ?>
</div>