<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Commande_c extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('form', 'url', 'text', 'string'));
        $this->load->library(array('session', 'form_validation', 'email'));
        $this->load->model(array('Commande_m', 'Users_m', 'Produit_m', 'Panier_m'));
    }

    public function check_droit($droit) {
        if ($this->session->userdata('droit') < $droit) redirect('Users_c');
    }

    public function index() {
        $this->check_droit(2);
        $this->load->view('head_v');
        $this->load->view('admin/navAdmin_v');
        $data['titre'] = "affichage du tableau commandes";
        $data['commande'] = $this->Commande_m->getCommandesAPreparer();
        $this->load->view('admin/commande/table_commande_v', $data);
        $this->load->view('foot_v');
    }

    public function afficherCommandesClient() {
        $this->check_droit(1);
        $this->load->view('head_v');
        $this->load->view('clients/navClient_v');
        $data['titre'] = "affichage du tableau commandes";
        $data['commande'] = $this->Commande_m->getCommandeByUser($this->session->userdata('id_user'));
        $this->load->view('clients/commande/table_commande_v', $data);
        $this->load->view('foot_v');
    }

    public function afficherDetailsCommande($idCommande) {
        $this->check_droit(2);
        $this->load->view('head_v');
        $this->load->view('admin/navAdmin_v');
        $data['titre'] = $this->Commande_m->getCommande($idCommande);
        $data['commande'] = $this->Panier_m->getProduitByCommande($idCommande);
        $this->load->view('admin/commande/detail_commande_v', $data);
        $this->load->view('foot_v');
    }

    public function afficherDetailsCommandeClient($idCommande) {
        $this->check_droit(1);
        $this->load->view('head_v');
        $this->load->view('clients/navClient_v');
        $data['titre'] = $this->Commande_m->getCommande($idCommande);
        $data['commande'] = $this->Panier_m->getProduitByCommande($idCommande);
        $this->load->view('clients/commande/detail_commande_v', $data);
        $this->load->view('foot_v');
    }

    public function validerCommande($idCommande) {
        $this->check_droit(2);
        $produitCommande = $this->Panier_m->getProduitByCommande($idCommande);
        foreach ($produitCommande as $value) {
            $produit = $this->Produit_m->getProduitById($value->id_produit);
            if ($value->quantite > $produit["stock"]) redirect('Commande_c');
        }
        foreach ($produitCommande as $value) {
            $produit = $this->Produit_m->getProduitById($value->id_produit);
            $donneeProduit = array(
                'stock' => $produit['stock'] - $value->quantite
            );
            $this->Produit_m->updateProduit($value->id_produit,$donneeProduit);
        }
        $donnees = array(
            'id_etat' => 2
        );
        $this->Commande_m->updateCommande($idCommande,$donnees);
        redirect('Commande_c');
    }
}