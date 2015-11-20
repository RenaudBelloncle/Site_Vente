<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="row">
    <?php if( $produit != NULL): ?>
        <li>
            <div class="row">
                <div class="panel clearfix">
                    <img src="<?=base_url();?>images/<?=$produit["photo"]; ?>" alt="image de <?=$produit["nom"]; ?>" class="left">
                    <div class ="right"><h2 >
                            <?php if( $produit["id_type"] == 1): ?>
                                Figurine
                            <?php endif; ?>
                            <?php if( $produit["id_type"] == 2): ?>
                                Peluche
                            <?php endif; ?>
                            <?php if( $produit["id_type"] == 3): ?>
                                Poster
                            <?php endif; ?>
                            <?=$produit["nom"]; ?></h2><br>

                        <h3 >Prix : <?=$produit["prix"]; ?> € </h3><br>
                        <h4>Description du produit :</h4>
                        <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                        <h4>Quantité :
                            <?php if( $produit["stock"] == 0): ?>
                                <span class="alert round label">Rupture de stock !</span>
                            <?php endif; ?>
                            <?php if( $produit["stock"] <= 10 && $produit["stock"]>0): ?>
                                <span class="warning round label">Limité !</span>
                            <?php endif; ?>
                            <?php if( $produit["stock"] > 10): ?>
                                <span class="success round label">Disponible !</span>
                            <?php endif; ?>
                        </h4><br>
                    </div></div>
            </div>
        </li>
    <?php endif; ?>
</div>