<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panier_m extends CI_Model {

    public function getPanier($iduser) {
        $this->db->select('pa.id_panier, pa.id_produit, pa.quantite, p.nom, t.libelle, p.photo, pa.prix, pa.dateAjoutPanier');
        $this->db->from('panier pa');
        $this->db->join('produit p', 'pa.id_produit=p.id');
        $this->db->join('typeProduit t', 'p.id_type=t.id_type');
        $this->db->where('pa.id_user', $iduser);
        $this->db->where('pa.id_commande', NULL);
        $this->db->order_by('pa.id_panier', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function addToPanier($donnees) {
        return $this->db->insert("panier",$donnees);
    }

    public function deleteProduit($id) {
        $this->db->delete("panier", array("id_panier"=>$id));
    }

    public function getProduitByPanier($id) {
        return $this->db->get_where('panier', array('id_panier'=>$id, 'id_commande'=>null))->row_array();
    }

    public function getProduitByProduit($idProduit, $idUser) {
        return $this->db->get_where('panier', array('id_produit'=>$idProduit, 'id_user'=>$idUser, 'id_commande'=>null))->row_array();
    }

    public function getProduitByCommande($idCommande) {
        $this->db->select('pa.id_panier, pa.id_produit, pa.quantite, p.nom, t.libelle, p.photo, pa.prix, pa.dateAjoutPanier');
        $this->db->from('panier pa');
        $this->db->join('produit p', 'pa.id_produit=p.id');
        $this->db->join('typeProduit t', 'p.id_type=t.id_type');
        $this->db->where('pa.id_commande', $idCommande);
        $this->db->order_by('pa.id_panier', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function updateProduit($id, $donnees) {
        $this->db->where("id_panier",$id);
        $this->db->update("panier", $donnees);
    }
}