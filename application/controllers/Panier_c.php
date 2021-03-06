<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Panier_c extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('form','url','text','string'));
        $this->load->library(array('session','form_validation','email'));
        $this->load->model(array('Panier_m','Users_m','Produit_m','Commande_m'));
    }

    public function check_droit($droit) {
        if ($this->session->userdata('droit') < $droit) redirect('Users_c');
    }

    public function index() {
        $this->check_droit(1);
        $this->load->view('head_v');
        $this->load->view('clients/navClient_v');
        $data['titre'] = "affichage du tableau panier";
        $data['panier'] = $this->Panier_m->getPanier($this->session->userdata('id_user'));
        $data['produit'] = $this->Produit_m->getAllProduits();
        $this->load->view('clients/panier/table_panier_v',$data);
        $this->load->view('foot_v');
    }

    public function addToPanier($idProduit) {
        $this->check_droit(1);
        $panier = $this->Panier_m->getProduitByProduit($idProduit, $this->session->userdata('id_user'));
        if ($panier != NULL) {
            $this->addQuantite($panier['id_panier'], 0);
            redirect('Produit_c/afficherProduitsClients');
        }
        $produit = $this->Produit_m->getProduitById($idProduit);
        $donnees = array (
            'id_user' => $this->session->userdata('id_user'),
            'id_produit' => $produit['id'],
            'quantite' => 1,
            'prix' => $produit['prix'],
            'dateAjoutPanier' => date("Y-m-d H:i:s")
        );
        $this->Panier_m->addToPanier($donnees);
        redirect('Produit_c/afficherProduitsClients');
    }

    public function deleteProduit($id) {
        $this->check_droit(1);
        if(is_numeric($id)) $this->Panier_m->deleteProduit($id);
        redirect('Panier_c');
    }

    public function viderPanier(){
        $this->Panier_m->deletePanier($this->session->userdata('id_user'));
        redirect('Panier_c');
    }

    public function isOnPanier($panier, $id){
        foreach($panier as $val):
            if($val->id_produit == $id):
                return True;
            endif;
        endforeach;
        return False;
    }

    public function addQuantite($id, $redir) {
        $this->check_droit(1);
        if(is_numeric($id)) {
            $panier = $this->Panier_m->getProduitByPanier($id);
            $produit = $this->Produit_m->getProduitById($panier['id_produit']);
            $donnees = array(
                'quantite' => $panier['quantite']+1,
                'prix' => $panier['prix'] + $produit['prix'],
                'dateAjoutPanier' => date("Y-m-d H:i:s")
            );
            $this->Panier_m->updateProduit($id, $donnees);
        }
        if ($redir == 1) {
            redirect('Panier_c');
        }
        redirect('Produit_c/afficherProduitsClients');
    }

    public function delQuantite($id) {
        $this->check_droit(1);
        if(is_numeric($id)) {
            $panier = $this->Panier_m->getProduitByPanier($id);
            if ($panier['quantite'] == 1) {
                $this->Panier_m->deleteProduit($id);
            } else {
                $produit = $this->Produit_m->getProduitById($panier['id_produit']);
                $donnees = array(
                    'id_user' => $this->session->userdata('id_user'),
                    'quantite' => $panier['quantite'] - 1,
                    'prix' => $panier['prix'] - $produit['prix'],
                    'dateAjoutPanier' => date("Y-m-d H:i:s")
                );
                $this->Panier_m->updateProduit($id, $donnees);
            }
        }
        redirect('Panier_c');
    }

    public function validerCommande() {
        $this->check_droit(1);
        $panier = $this->Panier_m->getPanier($this->session->userdata('id_user'));
        $prix = 0;
        foreach($panier as $value) {
            $prix = $prix + $value->prix;
        }
        $donneeCommande = array(
            'id_user' => $this->session->userdata('id_user'),
            'prix' => $prix,
            'date_achat' => date("Y-m-d"),
            'id_etat' => 1
        );
        $idcommande = $this->Commande_m->addCommande($donneeCommande);
        foreach($panier as $value) {
            $donneeProduit = array(
                'id_commande' => $idcommande
            );
            $this->Panier_m->updateProduit($value->id_panier,$donneeProduit);
        }
        redirect('Panier_c');
    }
}