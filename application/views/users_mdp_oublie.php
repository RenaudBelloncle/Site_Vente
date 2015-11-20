<div class="row">
    <div class="panel">
        <h1>Mot de passe oublié</h1>
        <?=form_open('Users_c/validFormMdpOublie'); ?>
        <label for="email">email:</label>
        <input type="text" name="email" value="<?=set_value('email');?>" />
        <?=form_error('email','<span class="error">',"</span>");?>
        <?php if(isset($erreur))echo '<span class="error">'.$erreur."</span>";?> <br>
        <input type="submit" value="Envoyer" />
        <?=form_close(); ?>
        <p><?= anchor('Users_c','Retour')?></p>
    </div>
</div>
