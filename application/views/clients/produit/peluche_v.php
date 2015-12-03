<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<div class="row">
    <h1>Recapitulatifs des produits</h1>
    <tbody>
    <?php if( $produit != NULL): ?>
        <h2>Peluches</h2>
        <hr>
        <div class="large-block-grid-3 medium-block-grid-2 large">
            <?php foreach ($produit as $value): ?>
                <?php if ($value->libelle == 'Peluche'): ?>
                    <li><div class="row">
                            <div class="panel clearfix">
                                <a class="custom-thumbnail-class" href="<?=site_url("Produit_c/infoProduitClient")."/".$value->id;?>">
                                    <img style="height:300px;width:300px" src="<?=base_url();?>images/<?=$value->photo; ?>" alt="image de <?=$value->libelle; ?>"></a><br>
                                <h4><?=$value->nom; ?></h4>

                            </div>
                        </div>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>

    <?php endif; ?>
    <tbody>
</div>