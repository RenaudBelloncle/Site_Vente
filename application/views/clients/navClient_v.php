<div class="sticky">
<nav class="top-bar" data-topbar role="navigation">
    <ul class="title-area">
        <li class="name">
            <h1><a href="<?=site_url("Produit_c/afficherProduitsClients");?>">Figurine Mania</a> </h1>
        </li>
        <li class="toggle-topbar menu-icon">
            <a href="#"><span>Menu</span></a></li>
    </ul>
    <section class="top-bar-section">
        <ul class="left">
            <li class="has-dropdown">
                <a href="<?=site_url("Produit_c/afficherProduitsClients");?>">Nos produits</a>
                <ul class="dropdown">
                    <li><a href="<?=site_url("Produit_c/afficherType")."/1";?>">Figurines</a></li>
                    <li><a href="<?=site_url("Produit_c/afficherType")."/2";?>">Peluches</a></li>
                    <li><a href="<?=site_url("Produit_c/afficherType")."/3";?>">Posters</a></li>
                </ul>
            </li>
            <li><a href="<?=site_url("Panier_c");?>">Mon Panier</a></li>
            <li class="has-dropdown">
                <a href="<?=site_url("Client_c/afficherCompte");?>">Mon Compte</a>
                <ul class="dropdown">
                    <li><a href="<?=site_url("Commande_c/afficherCommandesClient");?>">Consulter mes Commandes</a></li>
                    <li><a href="<?=site_url("Client_c/modifierCompte");?>">Modifier mes Coordonnées</a></li>
                </ul>
            </li>
        </ul>

        <ul class="right">
            <li class="has-form">
                <div class="row collapse">
                    <form method="post" action="<?=site_url("Produit_c/validerProduitSearchBar");?>">
                        <input type="hidden" name="<?=$this->security->get_csrf_token_name(); ?>" value="<?=$this->security->get_csrf_hash();?>">
                        <div class="large-8 small-9 columns">
                            <input name="nom" type="text" placeholder="Rechercher"/>
                        </div>
                        <div class="large-4 small-3 columns">
                            <input type="submit" class="success button expand" value="Valider"/>
                        </div>
                    </form>
                </div>
            </li>
            <li  class="name"><h3 style="color:#FFFFFF; font-size : 10pt" >Bonjour
                    <?=$this->session->userdata('login')?></h3><li>
            <li><a href="<?=site_url('users_c/deconnexion');?>">Déconnexion</a></li>
        </ul>
    </section>
</nav>
</div>