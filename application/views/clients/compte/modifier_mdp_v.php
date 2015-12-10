<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<form method="post" action="<?=site_url('Client_c/validFormModifierMdp')?>">
    <input type="hidden" name="<?=$this->security->get_csrf_token_name(); ?>" value="<?=$this->security->get_csrf_hash(); ?>">
    <div class="row">
        <h3>Modifier le mot de passe</h3>
        <fieldset>
            <legend>Informations personnelles</legend>
            <input name="id_user"  type="hidden" value="<?php if(isset($user['id_user'])) echo $user['id_user']; ?>"/>
            <label>Ancien mot de passe
            <input name="ancienPass"  type="password"  size="18" 	value=""/>
                <?= form_error('ancienPass');?>
            </label>
            <label>Nouveau mot de passe
                <input name="password"  type="password"  size="18" 	value=""/>
                <?= form_error('password');?>
            </label>
            <label>Confirmation
                <input name="pass"  type="password"  size="18" 	value=""/>
                <?= form_error('pass');?>
            </label>
            <br><br>
            <input class="round tiny button" type="submit" name="ModifierMdp" value="Modifier" />
        </fieldset>
    </div>
</form>