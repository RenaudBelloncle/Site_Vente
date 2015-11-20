<nav class="top-bar" data-topbar role="navigation">
    <ul class="title-area"> 
      <li class="name"> 
        <h1><a href="">Espace administration</a> </h1> 
      </li> 
      <li class="toggle-topbar menu-icon">
       <a href="#"><span>Menu</span></a></li>
    </ul> 
    <section class="top-bar-section">
    <ul class="left">
    <li class="has-dropdown">
      <a href="#">Gestion des Commandes</a>
        <ul class="dropdown">
        <li><a class="SousMenu" href="">Consulter et Préparer les Commandes</a></li>
        <li><a class="SousMenu" href="<?=site_url('Commande_c');?>">Afficher/Editer/Supprimer des Commandes</a></li>
      </ul>
    </li>
    <li class="has-dropdown">
      <a href="#">Gestion des Produits</a>
      <ul class="dropdown">
          <li><a class="SousMenu" href="<?=site_url('Produit_c/creerProduit');?>" > Créer un Produit</a></li>
          <li><a class="SousMenu" href="<?=site_url('Produit_c');?>" >Afficher/Editer/Supprimer les Produits</a></li>
      </ul>
    </li>
    </ul>
    <ul class="right">
    <li><a href="<?=site_url('users_c/deconnexion');?>">Déconnexion</a></li>
    </ul>
    </section> 
</nav>
