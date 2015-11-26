<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Commande_c extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('form', 'url', 'text', 'string'));
        $this->load->library(array('session', 'form_validation', 'email'));
        $this->load->model(array('Commande_m', 'Users_m'));
    }

    public function check_droit($droit) {
        if ($this->session->userdata('droit') < $droit) redirect('Users_c');
    }

    public function index() {
        $this->check_droit(2);
        $this->load->view('head_v');
        $this->load->view('admin/navAdmin_v');
        $data['titre'] = "affichage du tableau commandes";
        $data['commandes'] = $this->Commande_m->getAllCommandes();
        $this->load->view('admin/commande/table_commande_v', $data);
        $this->load->view('foot_v');
    }

    public function afficherCommandesAPreparer() {
        $this->check_droit(2);
        $this->load->view('head_v');
        $this->load->view('admin/navAdmin_v');
        $data['titre'] = "affichage du tableau commandes";
        $data['commandes'] = $this->Commande_m->getCommandesAPreparer();
        $this->load->view('admin/commande/table_commande_preparer_v', $data);
        $this->load->view('foot_v');
    }

    public function ajouterCommandes(){

    }
}