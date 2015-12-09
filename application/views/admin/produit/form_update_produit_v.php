<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<form method="post" action="<?=site_url('Produit_c/validFormModifierProduit')?>">
	<input type="hidden" name="<?=$this->security->get_csrf_token_name(); ?>" value="<?=$this->security->get_csrf_hash(); ?>">
	<div class="row">
		<fieldset>
			<legend>Modifier un produit</legend>
			<input name="id" type="hidden" value="<?php if(isset($id)) echo $id; ?>"/>
			<label>Nom
				<input name="nom"  type="text"  size="18" 	value="<?=set_value('nom',$nom);?>"/>
				<?= form_error('nom');?>
			</label>
			<label>Type
				<select name="id_type">
					<?php foreach($typeProduit  as $key=>$value): ?>
						<option value="<?=$key; ?>"
							<?php if(isset($id_type)  and $id_type==$key): ?> selected="selected" <?php endif; ?> >
							<?=$value; ?>
						</option>
					<?php endforeach; ?>
				</select>
				<?=form_error('id_type');?>
			</label>
			<label>Prix
				<input name="prix"  type="text"  size="18"  value="<?=set_value('prix',$prix);?>"/>
				<?=form_error('prix');?>
			</label>
			<label>Photo
				<input name="photo"  type="text"  size="18" value="<?=set_value('photo',$photo);?>"/>
				<?=form_error('photo');?>
			</label>
			<input type="submit" name="ModifierProduit" value="Modifier" />
		</fieldset>
	</div>
</form>