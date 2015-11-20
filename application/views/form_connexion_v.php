<div class="row">
    <div class="panel">
        <?=form_open('Users_c/form_valid_connexion'); ?>
        <label for="login">Login:</label>
        <input type="text" name="login" value="<?=set_value('login');?>" />
        <?=form_error('login','<span class="error">',"</span>");?>
        <br>
        <label for="pass">Mot de passe:</label>
        <input type="password" name="pass" value="<?=set_value('pass');?>" />
        <?=form_error('pass','<span class="error">',"</span>");?>
        <br>
        <input type="submit" value="Connexion" />
        <?php if(isset($erreur))echo '<span class="error">'.$erreur."</span>";?>
        <?=form_close(); ?>
        <p><?=anchor('Users_c/inscription','Inscrivez vous!')?></p>
        <p><?=anchor('Users_c/mdp_oublie','Mot de passe oublié ?')?></p>
    </div>
</div>