<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<form method="post" action="<?=site_url('Client_c/validFormModifierCompte')?>">
    <input type="hidden" name="<?=$this->security->get_csrf_token_name(); ?>" value="<?=$this->security->get_csrf_hash(); ?>">
    <div class="row">
        <h3>Modifier les données personnelles</h3>
        <fieldset>
            <legend>Informations personnelles</legend>
            <input name="id_user"  type="hidden" value="<?php if(isset($user['id_user'])) echo $user['id_user']; ?>"/>

            <label>Nom*
                <input name="nom"  type="text"  size="18" 	value="<?=set_value('nom',$user['nom']);?>"/>
                <?= form_error('nom');?>
            </label>
            <label>Prenom*
                <input name="prenom"  type="text"  size="18" 	value="<?=set_value('prenom',$user['prenom']);?>"/>
                <?= form_error('prenom');?>
            </label>
            <label>Code Postal*
                <input name="code_postal"  type="text"  size="18"  value="<?=set_value('code_postal',$user['code_postal']);?>"/>
                <?=form_error('code_postal');?>
            </label>
            <label>Ville*
                <input name="ville"  type="text"  size="18" 	value="<?=set_value('ville',$user['ville']);?>"/>
                <?= form_error('ville');?>
            </label>
            <label>Adresse*
                <input name="adresse"  type="text"  size="18" 	value="<?=set_value('adresse',$user['adresse']);?>"/>
                <?= form_error('adresse');?>
            </label>
            <br>

            <legend>Informations de compte</legend>
            <label>Login
                <input name="login"  type="text"  size="18" 	value="<?=set_value('login',$user['login']);?>"/>
                <?= form_error('login');?>
            </label>
            <label>Mot de passe
            <input name="password"  type="password"  size="18" 	value="<?=set_value('password',$user['password']);?>"/>
            <?= form_error('password');?>
             </label>
            <label>Email
                <input name="email"  type="text"  size="18" 	value="<?=set_value('email',$user['email']);?>"/>
                <?= form_error('email');?>
            </label>
            <br><br>
            <input class="round tiny button" type="submit" name="ModifierCompte" value="Modifier" />
            <br><br>
            Les informations suivies de * ne sont pas obligatoires.
        </fieldset>
    </div>
</form>