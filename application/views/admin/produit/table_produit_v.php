<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="row">
	<table>
		<caption>Recapitulatifs des Produits</caption>
		<thead>
		<tr>
			<th>Type</th>
			<th>Nom</th>
			<th>Prix</th>
			<th>Stock</th>
			<th>Photo</th>
			<th>Opération</th>
		</tr>
		</thead>
		<tbody>
		<?php if( $produit != NULL): ?>
			<?php foreach ($produit as $value): ?>
				<tr>
					<td><?=$value->libelle; ?></td>
					<td><?=$value->nom; ?></td>
					<td><?=$value->prix; ?></td>
                    <td><?=$value->stock; ?></td>
					<td><img style="width:40px;height:40px" src="<?=base_url();?>images/<?=$value->photo; ?>" alt="image de <?=$value->libelle; ?>"></td>
					<td>
						<a href="<?=base_url();?>index.php/Produit_c/modifierProduit/<?=$value->id; ?>">Modifier</a>
						<a href="<?=site_url("Produit_c/supprimerProduit")."/".$value->id; ?>">Supprimer</a>
					</td>
				</tr>
			<?php endforeach; ?>
		<?php endif; ?>
		<tbody>
	</table>
</div>
<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
