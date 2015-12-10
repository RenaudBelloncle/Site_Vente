<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<form method="post" action="<?=site_url('Produit_c/validFormReapprovisionner')?>">
    <input type="hidden" name="<?=$this->security->get_csrf_token_name(); ?>" value="<?=$this->security->get_csrf_hash(); ?>">
    <div class="row">
        <fieldset>
            <legend>Réapprovisionner</legend>

            <input name="id"  type="hidden" value="<?php if(isset($id)) echo $id; ?>"/>

            <table>
                <caption>Recapitulatifs des Produits</caption>
                <thead>
                <tr>
                    <th>Nom</th>
                    <th>Type</th>
                    <th>Prix</th>
                    <th>Stock</th>
                    <th>Photo</th>
                    <th>Nouveau stock</th>

                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><?=set_value('nom',$nom);?></td>
                    <td><?=set_value('id_type',$id_type);?></td>
                    <td><?=set_value('prix',$prix);?></td>
                    <td><?=set_value('stock',$stock);?></td>
                    <td><img style="width:40px;height:40px" src="<?=base_url();?>images/<?=set_value('photo',$photo);?>"></td>
                    <td>
                        <label><input name="stock"  type="text"  size="5"  value="<?=set_value('stock',$stock);?>"/>
                            <?=form_error('stock');?></label>
                    </td>
                </tr>
                <tbody>
            </table>
            <input class="round tiny button" type="submit" name="Remplir le stock" value="Remplir le stock" />
        </fieldset>
    </div>
</form>