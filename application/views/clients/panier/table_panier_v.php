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
    <table>
        <caption><h3>Produits dans le Panier</h3></caption>
        <thead>
        <tr>
                <td><h4>Quantité</h4></td>
                <td><h4>Nom</h4></td>
                <td><h4>Type</h4></td>
                <td><h4>Photo</h4></td>
                <td><h4>Prix</h4></td>
                <td><h4>Data d'ajout</h4></td>
                <td><h4>Opération</h4></td>
            </tr>
        </thead>
        <tbody>
                <?php foreach($panier as $value): ?>
                    <tr>
                        <td>
                            <h4><a href="<?=site_url("Panier_c/delQuantite")."/".$value->id_panier;?>" >-</a>
                            <?=$value->quantite?>

                                <?php foreach($produit as $val): ?>
                                <?php if($val->stock > $value->quantite && $val->id== $value->id_produit): ?>
                                    <a href="<?=site_url("Panier_c/addQuantite")."/".$value->id_panier."/1";?>" >+</a></h4>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </td>
                        <td><h5><?=$value->nom?></h5></td>
                        <td><h5><?=$value->libelle?></h5></td>
                        <td><img style="width:40px;height:40px" src="<?=base_url();?>images/<?=$value->photo; ?>" alt="image de <?=$value->libelle; ?>"></td>
                        <td><h5><?=$value->prix?></h5></td>
                        <td><h5><?=$value->dateAjoutPanier?></h5></td>
                        <td>
                            <h5><a href="<?=site_url("Panier_c/deleteProduit")."/".$value->id_panier;?>" >Supprimer</a></h5>
                        </td>
                    </tr>
                <?php endforeach; ?>
        </tbody>
    </table>
    <a href="<?=site_url("Panier_c/validerCommande");?>" >Valider Commande</a>
    <?php endif; ?>
</div>