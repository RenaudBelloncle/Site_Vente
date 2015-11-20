<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Commande_m extends CI_Model {

    public function getAllCommandes() {
        $this->db->select('u.nom','u.prenom','id_lieu','c.prix','c.date_achat','e.libelle');
        $this->db->from('commande c');
        $this->db->join('user u','c.id_user=u.id_user');
        $this->db->join('etat e','c.id_etat=e.id_etat');
        $this->db->order_by('e.id_etat','ASC');
        $this->db->order_by('c.date_achat','DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function getCommandesAPreparer() {
        $this->db->select('u.nom','u.prenom','id_lieu','c.prix','c.date_achat','e.libelle');
        $this->db->from('commande c');
        $this->db->join('user u','c.id_user=u.id_user');
        $this->db->join('etat e','c.id_etat=e.id_etat');
        $this->db->where('u.id_etat',1);
        $this->db->order_by('e.id_etat','ASC');
        $this->db->order_by('c.date_achat','DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function insertCommande($donnees){
        return $this->db->insert("commande",$donnees);
    }
}