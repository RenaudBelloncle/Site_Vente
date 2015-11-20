<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<div class="row">
        <h1>Recapitulatifs des produits</h1>
        <tbody>
            <?php if( $produit != NULL): ?>
            <div class="large-block-grid-3 medium-block-grid-2 large">
                <h2>Figurines</h2>
                <hr>
                <?php foreach ($produit as $value): ?>


                    <?php if ($value->libelle == 'Figurine'): ?>
                        <li><div class="row">
                                <div class="panel clearfix">
                                    <a class="custom-thumbnail-class" href="<?=site_url("Produit_c/infoProduitClient")."/".$value->id;?>">
                                        <img src="<?=base_url();?>images/<?=$value->photo; ?>" alt="image de <?=$value->libelle; ?>"></a><br>
                                    <h4><?=$value->nom; ?></h4>

                                    <?php if($panier != NULL):?>
                                        <?php foreach($panier as $val): ?>
                                            <?php if($value->id == $val->id_produit): ?>
                                                <?php if($value->stock -$val->quantite > 0): ?>
                                                <a href="<?=site_url("Panier_c/addToPanier")."/".$value->id;?>" >Ajouter au Panier !!!</a>
                                                <?php endif; ?>
                                                <?php if( $value->stock -$val->quantite <= 0): ?>
                                                    <span class="alert round label">Rupture de stock !</span>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>

                                        <?php if($value->id != $val->id_produit): ?>
                                            <?php if($value->stock > 0): ?>
                                                <a href="<?=site_url("Panier_c/addToPanier")."/".$value->id;?>" >Ajouter au Panier</a>
                                            <?php endif; ?>
                                            <?php if( $value->stock <= 0): ?>
                                                <span class="alert round label">Rupture de stock !</span>
                                            <?php endif; ?>
                                        <?php endif; ?>

                                    <?php endif; ?>

                                    <?php if($panier == NULL):?>
                                        <?php if( $value->stock > 0): ?>
                                            <a href="<?=site_url("Panier_c/addToPanier")."/".$value->id;?>" >Ajouter au Panier</a>
                                        <?php endif; ?>
                                        <?php if( $value->stock <= 0): ?>
                                            <span class="alert round label">Rupture de stock !</span>
                                        <?php endif; ?>
                                    <?php endif; ?>

                                </div>
                            </div>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>

                    <h2>Peluches</h2>
                <hr>
            <div class="large-block-grid-3 medium-block-grid-2 large">
                <?php foreach ($produit as $value): ?>
                    <?php if ($value->libelle == 'Peluche'): ?>
                        <li><div class="row">
                                <div class="panel clearfix">
                                    <a class="custom-thumbnail-class" href="<?=site_url("Produit_c/infoProduitClient")."/".$value->id;?>">
                                        <img src="<?=base_url();?>images/<?=$value->photo; ?>" alt="image de <?=$value->libelle; ?>"></a><br>
                                    <h4><?=$value->nom; ?></h4>

                                    <?php foreach($panier as $val): ?>
                                        <?php if( $panier != NULL && ($value->stock -$val->quantite) > 0 && $value->id == $val->id_produit): ?>
                                            <a href="<?=site_url("Panier_c/addToPanier")."/".$value->id;?>" >Ajouter au Panier</a>
                                        <?php endif; ?>

                                        <?php if( $panier == NULL && $value->stock != 0 || $panier != NULL && $value->id != $val->id_produit && $value->stock != 0): ?>
                                            <a href="<?=site_url("Panier_c/addToPanier")."/".$value->id;?>" >Ajouter au Panier</a>
                                        <?php endif; ?>

                                        <?php if( $value->stock-$val->quantite <= 0): ?>
                                            <span class="alert round label">Rupture de stock !</span>
                                        <?php endif; ?>
                                    <?php endforeach; ?>

                                </div>
                            </div>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>

                    <h2>Posters</h2>
                <hr>
                <div class="large-block-grid-3 medium-block-grid-2 large">
                <?php foreach ($produit as $value): ?>
                    <?php if ($value->libelle == 'Poster'): ?>
                        <li><div class="row">
                                <div class="panel clearfix">
                                    <a class="custom-thumbnail-class" href="<?=site_url("Produit_c/infoProduitClient")."/".$value->id;?>">
                                        <img src="<?=base_url();?>images/<?=$value->photo; ?>" alt="image de <?=$value->libelle; ?>"></a><br>
                                    <h4><?=$value->nom; ?></h4>

                                    <?php foreach($panier as $val): ?>
                                        <?php if( $panier != NULL && ($value->stock -$val->quantite) > 0 && $value->id == $val->id_produit): ?>
                                            <a href="<?=site_url("Panier_c/addToPanier")."/".$value->id;?>" >Ajouter au Panier</a>
                                        <?php endif; ?>

                                    <?php if( $panier == NULL && $value->stock != 0 || $panier != NULL && $value->id != $val->id_produit && $value->stock != 0): ?>
                                        <a href="<?=site_url("Panier_c/addToPanier")."/".$value->id;?>" >Ajouter au Panier</a>
                                    <?php endif; ?>

                                    <?php if( $value->stock-$val->quantite <= 0): ?>
                                        <span class="alert round label">Rupture de stock !</span>
                                    <?php endif; ?>
                                    <?php endforeach; ?>

                                </div>
                            </div>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
              </div>

            <?php endif; ?>
        <tbody>
</div>
