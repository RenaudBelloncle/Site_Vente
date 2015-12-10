DROP TABLE  IF EXISTS panier,commande, produit, user, typeProduit, etat;

-- --------------------------------------------------------
-- Structure de la table typeproduit
--
CREATE TABLE IF NOT EXISTS typeProduit (
  id_type int(10) NOT NULL,
  libelle varchar(50) DEFAULT NULL,
  PRIMARY KEY (id_type)
)  DEFAULT CHARSET=utf8;
-- Contenu de la table typeproduit
INSERT INTO typeProduit (id_type, libelle) VALUES
(1, 'Figurine'),
(2, 'Peluche'),
(3, 'Poster');

-- --------------------------------------------------------
-- Structure de la table etat

CREATE TABLE IF NOT EXISTS etat (
  id_etat int(11) NOT NULL AUTO_INCREMENT,
  libelle varchar(20) NOT NULL,
  PRIMARY KEY (id_etat)
) DEFAULT CHARSET=utf8 ;
-- Contenu de la table etat
INSERT INTO etat (id_etat, libelle) VALUES
(1, 'À préparer'),
(2, 'Expédiée');

-- --------------------------------------------------------
-- Structure de la table produit

CREATE TABLE IF NOT EXISTS produit (
  id int(10) NOT NULL AUTO_INCREMENT,
  id_type int(10) DEFAULT NULL,
  nom varchar(50) DEFAULT NULL,
  prix float(5,2) DEFAULT NULL,
  photo varchar(50) DEFAULT NULL,
  dispo tinyint(4) NOT NULL,
  stock int(11) NOT NULL,
  description varchar(500) DEFAULT NULL,
  PRIMARY KEY (id),
  KEY id_type (id_type),
  CONSTRAINT produit_fk_1 FOREIGN KEY (id_type) REFERENCES typeProduit (id_type)
) DEFAULT CHARSET=utf8 ;

INSERT INTO produit (id,id_type,nom,prix,photo,dispo,stock, description) VALUES
  (1,1, 'Catwoman','139.99','Figurine_Catwoman.jpg',0,0,'Figurine PVC de 15 cm peinte à la main.<br><br>
  Accessoires :<br><br> 2 paires de mains amovibles,<br><br> 2 queues, 2 set d arme.<br>'),
(2,1, 'Batman','89.99','Figurine_Batman.jpg',1,3,'Figurine PVC de 15 cm peinte à la main.<br><br>
Accessoires : <br><br>cape amovible et déformable,<br><br> 3 sets d armes dont le batarang.'),
(3,1, 'Joker','109.99','Figurine_Joker.jpg',1,3,'Figurine PVC de 15 cm peinte à la main.<br><br>
Accessoires :<br><br> 2 paires de mains,<br><br> couteaux de lancé, 2 têtes.'),
(4,1, 'Flash','79.99','Figurine_Flash.jpg',1,8,'Figurine PVC de 15 cm peinte à la main.<br><br>
Accessoires : <br><br>4 types d éclairs (rapidités).'),
(6,1, 'Rorschach','89.99','Figurine_Rorcha.jpg',1,2,'Figurine PVC de 15 cm peinte à la main.<br><br>
Accessoires : <br><br>pistolet 9 mm,<br><br> 3 visages.'),
(7,1, 'Garrus','59.99','Figurine_Garrus.jpg',1,1,'Figurine PVC de 15 cm peinte à la main.<br><br>
Accessoires : <br><br>2 armes issues du jeu.<br>'),
(8,1, 'Tali','59.99','Figurine_Tali.jpg',1,1,'Figurine PVC de 15 cm peinte à la main.<br><br>
Accessoires : <br><br>2 armes issues du jeu.<br>'),
(9,1, 'Dark Vador','99.99','Figurine_DarkVador.jpg',1,3,'Figurine PVC de 15 cm peinte à la main.<br><br>
Accessoires : <br><br>2 lasers pour le sabre laser,<br><br> cape amovible et déformable.'),
(10,1, 'Stormtrooper','95.99','Figurine_Stormtrooper.jpg',1,1,'Figurine PVC de 15 cm peinte à la main.<br><br>
Accessoires : <br><br>2 pistolets pour le sabre laser.'),
(11,1, 'Bobba Fett','95.99','Figurine_BobbaFett.jpg',1,3,'Figurine PVC de 15 cm peinte à la main.<br><br>
Accessoires : <br><br>2 pistolets pour le sabre laser.'),
(12,1, 'Albator','69.99','Figurine_Albator.jpg',1,5,'Figurine PVC de 15 cm peinte à la main.'),
(13,2, 'Monokuma','30.50','Peluche_Monokuma.jpg',1,8,'Peluche de 30 cm de hauteur. <br><br>
Coton synthétique'),
(14,2, 'Pikachu','21.50','Peluche_Pikachu.jpg',1,7,'Peluche de 30 cm de hauteur. <br><br>
Coton synthétique'),
(15,2, 'Crocmou','23.50','Peluche_Crocmou.jpg',1,5,'Peluche de 30 cm de hauteur. <br><br>
Coton synthétique'),
(16,2, 'Gobelin','13.50','Peluche_Gobelin.jpg',1,5,'Peluche de 30 cm de hauteur. <br><br>
Coton synthétique'),
(17,3, 'Ari','20.00','Poster_Ari.jpg',1,20,'Poster de 100 cm *h et 50 cm * l'),
(18,3, 'DC Girls','40.00','Poster_DCGirls.jpg',1,12,'Poster de 100 cm *h et 50 cm * l'),
(19,3, 'Ezio','20.00','Poster_Ezio.jpg',1,20,'Poster de 100 cm *h et 50 cm * l'),
(20,3, 'Miku','20.00','Poster_Miku.jpg',1,20,'Poster de 100 cm *h et 50 cm * l');


-- --------------------------------------------------------
-- Structure de la table user

CREATE TABLE IF NOT EXISTS user (
  id_user int(11) NOT NULL AUTO_INCREMENT,
  email varchar(255) NOT NULL,
  password varchar(255) NOT NULL,
  login varchar(255) NOT NULL,
  nom varchar(255) NOT NULL,
  prenom varchar(255) NOT NULL,
  code_postal varchar(255) NOT NULL,
  ville varchar(255) NOT NULL,
  adresse varchar(255) NOT NULL,
  valide tinyint NOT NULL,
  droit tinyint NOT NULL,
  PRIMARY KEY (id_user)
) DEFAULT CHARSET=utf8;

# Contenu de la table user
INSERT INTO user (id_user,login,password,email,valide,droit) VALUES
(1, 'admin', 'admin', 'admin@gmail.com',1,2),
(2, 'vendeur', 'vendeur', 'vendeur@gmail.com',1,2),
(4, 'client2', 'client2', 'client2@gmail.com',1,1),
(5, 'client3', 'client3', 'client3@gmail.com',1,1);

INSERT INTO user (id_user,login,password,email,valide,droit, prenom, nom) VALUES
(3, 'client', 'client', 'client@gmail.com',1,1, 'Norbert', 'TRUC');


CREATE TABLE IF NOT EXISTS commande (
  id_commande int(11) NOT NULL AUTO_INCREMENT,
  id_user int(11) NOT NULL,
  prix float(5,2) NOT NULL,
  date_achat date NOT NULL,
  id_etat int(11) NOT NULL,
  PRIMARY KEY (id_commande),
  KEY id_user (id_user),
  KEY id_etat (id_etat)
) DEFAULT CHARSET=utf8 ;



-- --------------------------------------------------------
-- Structure de la table panier
CREATE TABLE IF NOT EXISTS panier (
  id_panier int(11) NOT NULL AUTO_INCREMENT,
  id_user int(11) NOT NULL,
  id_produit int(11) NOT NULL,
  quantite int(11) NOT NULL,
  prix float(5,2) NOT NULL,
  id_commande int(11),
  dateAjoutPanier datetime NOT NULL,
  PRIMARY KEY (id_panier),
  KEY id_user (id_user),
  KEY id_produit (id_produit)
) DEFAULT CHARSET=utf8 ;


--
-- Contraintes pour la table commande
--
ALTER TABLE commande
  ADD CONSTRAINT commande_fk_1 FOREIGN KEY (id_user) REFERENCES user (id_user),
  ADD CONSTRAINT commande_fk_2 FOREIGN KEY (id_etat) REFERENCES etat (id_etat);

--
-- Contraintes pour la table panier
--
ALTER TABLE panier
  ADD CONSTRAINT panier_fk_1 FOREIGN KEY (id_user) REFERENCES user (id_user),
  ADD CONSTRAINT panier_fk_2 FOREIGN KEY (id_produit) REFERENCES produit (id),
  ADD CONSTRAINT panier_fk_3 FOREIGN KEY (id_commande) REFERENCES commande (id_commande);



