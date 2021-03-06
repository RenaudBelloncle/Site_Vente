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
                                <img style="height:300px;width:300px" src="<?=base_url();?>images/<?=$value->photo; ?>" alt="image de <?=$value->libelle; ?>"><br>
                                <h4><?=$value->nom; ?></h4>
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
                                <img style="height:300px;width:300px" src="<?=base_url();?>images/<?=$value->photo; ?>" alt="image de <?=$value->libelle; ?>"><br>
                                <h4><?=$value->nom; ?></h4>
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
                                <img style="height:400px;width:300px" src="<?=base_url();?>images/<?=$value->photo; ?>" alt="image de <?=$value->libelle; ?>"><br>
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
