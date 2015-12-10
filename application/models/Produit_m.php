<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Produit_m extends CI_Model {

    public function getAllProduits() {
        $this->db->select('p.id, t.libelle, p.nom, p.prix, p.photo, p.stock');
        $this->db->from('produit p');
        $this->db->join('typeProduit t', 'p.id_type=t.id_type');
        $this->db->order_by('t.libelle', 'ASC');
        $this->db->order_by('p.nom', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function getAllProduitsByType($id_type) {
        $this->db->select('p.id, t.libelle, p.nom, p.prix, p.photo, p.stock');
        $this->db->from('produit p');
        $this->db->join('typeProduit t', 'p.id_type=t.id_type');
        $this->db->where('p.id_type', $id_type);
        $this->db->order_by('t.libelle', 'ASC');
        $this->db->order_by('p.nom', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    function insertProduit($donnees) {
        return $this->db->insert("produit",$donnees);
    }

    function deleteProduit($id){
        $this->db->delete("produit", array("id" => $id));
    }

    function getProduitById($id) {
        return $this->db->get_where('produit', array('id' => $id), 1, 0)->row_array();
    }

    function getProduitSearchBar($nom) {
        $this->db->select('*');
        $this->db->from('produit p');
        $this->db->join('typeProduit t', 'p.id_type=t.id_type');
        $this->db->like('nom',$nom, 'after');
        $this->db->order_by('t.libelle', 'ASC');
        $this->db->order_by('p.nom', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    function updateProduit($id, $donnees) {
        $this->db->where("id", $id);
        $this->db->update("produit", $donnees);
    }

    function verif_id_type($id_type){
        $this->db->select('id_type')->from('typeProduit')->where("id_type",$id_type);
        $result = $this->db->get();
        return $result->num_rows();
    }

    function getTypeProduitDropdown(){
        $result = $this->db->from("typeProduit")->order_by('id_type')->get();
        $retour = array();
        if($result->num_rows() > 0){
            $retour[''] = 'selectionner un type';
            foreach($result->result_array() as $row) $retour[$row['id_type']] = $row['libelle'];
        }
        return $retour;
    }
}