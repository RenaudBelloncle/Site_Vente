<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Commande_m extends CI_Model {

    public function getAllCommandes() {
        $this->db->select('*');
        $this->db->from('commande c');
        $this->db->join('user u','c.id_user=u.id_user');
        $this->db->join('etat e','c.id_etat=e.id_etat');
        $this->db->order_by('e.id_etat','ASC');
        $this->db->order_by('c.date_achat','DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function getCommandesAPreparer() {
        $this->db->select('*');
        $this->db->from('commande c');
        $this->db->join('user u','c.id_user=u.id_user');
        $this->db->join('etat e','c.id_etat=e.id_etat');
        $this->db->order_by('e.id_etat','ASC');
        $this->db->order_by('c.date_achat','DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function getCommandeByUser($id) {
        $this->db->select('*');
        $this->db->from('commande c');
        $this->db->join('etat e','c.id_etat=e.id_etat');
        $this->db->where('c.id_user', $id);
        $this->db->order_by('e.id_etat','ASC');
        $this->db->order_by('c.date_achat','DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function addCommande($donnees) {
        return $this->db->insert("commande",$donnees);
    }

    public function getCommande($donnees) {
        return $this->db->get_where('commande', array('id_user'=>$donnees['id_user'], 'prix'=>$donnees['prix'], 'date_achat'=>$donnees['date_achat'], 'id_etat'=>$donnees['id_etat']))->row_array();
    }

    public function updateCommande($idCommande,$donnees) {
        $this->db->where('id_commande',$idCommande);
        $this->db->update('commande',$donnees);
    }
}