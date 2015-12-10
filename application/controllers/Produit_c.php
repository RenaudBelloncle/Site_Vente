<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Produit_c extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('form','url','text','string'));
        $this->load->library(array('session','form_validation','email'));
        $this->load->model(array('Produit_m','Users_m','Panier_m'));
    }

    public function check_droit($droit) {
        if( $this->session->userdata('droit') < $droit) redirect('Users_c');
    }

    public function index() {
        $this->check_droit(2);
        $this->load->view('head_v');
        $this->load->view('admin/navAdmin_v');
        $data['titre']="affichage du tableau produit";
        $data['produit']=$this->Produit_m->getAllProduits();
        $this->load->view('admin/produit/table_produit_v',$data);
        $this->load->view('foot_v');
    }

    public function afficherProduitsClients() {
        $this->check_droit(1);
        $this->load->view('head_v');
        $this->load->view('clients/navClient_v');
        $data['titre']="affichage du tableau produit";
        $data['produit']=$this->Produit_m->getAllProduits();
        $this->load->view('clients/produit/table_produit_v',$data);
        $this->load->view('foot_v');
    }

    public function afficherProduits() {
        $this->check_droit(0);
        $this->load->view('head_v');
        $this->load->view('nav_v');
        $data['titre']="affichage du tableau produit";
        $data['produit']=$this->Produit_m->getAllProduits();
        $this->load->view('table_produit_v',$data);
        $this->load->view('foot_v');
    }

    public function afficherType($id_type){
        $this->check_droit(1);
        $this->load->view('head_v');
        $this->load->view('clients/navClient_v');
        $data['titre']="affichage du tableau produit";
        $data['produit']=$this->Produit_m->getAllProduitsByType($id_type);
        if ($id_type == 1) $this->load->view('clients/produit/figurine_v',$data);
        if ($id_type == 2) $this->load->view('clients/produit/peluche_v',$data);
        if ($id_type == 3) $this->load->view('clients/produit/poster_v',$data);
        $this->load->view('foot_v');
    }

    public function validerProduitSearchBar() {
        //$this->check_droit(1);
        $this->form_validation->set_rules('nom','nom','trim|required|min_length[1]');
        $this->form_validation->set_error_delimiters('<span class="error">','</span>');
        $nom = $this->input->post('nom');
        if($this->form_validation->run() == False) {
            redirect('Client_c');
        } else {
            $this->load->view('head_v');
            $this->load->view('clients/navClient_v');
            $data['titre']="affichage produits recherchés";
            $data['produit'] = $this->Produit_m->getProduitSearchBar($nom);
            $this->load->view('clients/produit/table_produit_v',$data);
            $this->load->view('foot_v');
        }
    }

    public function afficherProduitSearchBar($nom) {
        //$this->check_droit(1);
    }

    public function infoProduitClient($id){
        $this->check_droit(1);
        $this->load->view('head_v');
        $this->load->view('clients/navClient_v');
        $data['produit']=$this->Produit_m->getProduitById($id);
        $data['panier'] = $this->Panier_m->getPanier($this->session->userdata('id_user'));
        $this->load->view('clients/produit/info_produit_v',$data);
        $this->load->view('foot_v');
    }

    public function infoProduit($id){
        $this->load->view('head_v');
        $this->load->view('nav_v');
        $data['produit']=$this->Produit_m->getProduitById($id);
        $this->load->view('info_produit_v',$data);
        $this->load->view('foot_v');
    }

    public function creerProduit() {
        $this->check_droit(2);
        $this->load->view('head_v');
        $this->load->view('admin/navAdmin_v');
        $donnees['typeProduit']=$this->Produit_m->getTypeProduitDropdown();
        $this->load->view('admin/produit/form_create_produit_v',$donnees);
        $this->load->view('foot_v');
    }

    public function validFormCreerProduit() {
        $this->check_droit(2);
        $this->form_validation->set_rules('nom','nom','trim|required|min_length[2]|max_length[12]|is_unique[produit.nom]');
        $this->form_validation->set_rules('prix', 'prix', 'trim|required|numeric');
        $this->form_validation->set_rules('id_type', 'type', 'required|callback_id_type_check');
        $this->form_validation->set_error_delimiters('<span class="error">','</span>');
        $donnees= array(
            'nom'=>$this->input->post('nom'),
            'prix'=>$this->input->post('prix'),
            'id_type'=>$this->input->post('id_type'),
            'photo'=>$this->input->post('photo')
        );
        if($this->form_validation->run() == False) {
            $this->load->view('head_v');
            $this->load->view('admin/navAdmin_v');
            $donnees['typeProduit']=$this->Produit_m->getTypeProduitDropdown();
            $this->load->view('admin/produit/form_create_produit_v',$donnees);
            $this->load->view('foot_v');
        } else {
            $this->Produit_m->insertProduit($donnees);
            redirect('Produit_c/index');
        }
    }

    public function id_type_check($id_type) {
        $this->check_droit(2);
        $test_id_type=$this->Produit_m->verif_id_type($id_type);
        if ($test_id_type == 0) {
            $this->form_validation->set_message('id_type_check', 'Le %s n\'existe pas ');
            return FALSE;
        } else return TRUE;
    }

    public function supprimerProduit($id) {
        $this->check_droit(2);
        if(is_numeric($id)) $this->Produit_m->deleteProduit($id);
        redirect('/Produit_c/index');
    }

    public function reapprovisionner($id){
        $this->check_droit(2);
        $this->load->view('head_v');
        $this->load->view('admin/navAdmin_v');
        $donnees=$this->Produit_m->getProduitById($id);
        $this->load->view('admin/produit/reapprovisionnement_v',$donnees);
        $this->load->view('foot_v');
    }

    public function validFormReapprovisionner(){
        $this->check_droit(2);
        $id=$this->input->post('id');
        $donnees = array(
            'stock'=>$this->input->post('stock')
        );
        $this->form_validation->set_rules('id','id','trim|numeric');
        $this->form_validation->set_rules('stock', 'stock', 'trim|required|numeric');
        $this->form_validation->set_error_delimiters('<span class="error">','</span>');
        $donnees= array(
            'stock'=>$this->input->post('stock')
        );
        if($this->form_validation->run() == False){
            $this->load->view('head_v');
            $this->load->view('admin/navAdmin_v');
            $donnees['id']=$id;
            $this->load->view('admin/produit/reapprovisionnement_v',$donnees);
            $this->load->view('foot_v');
        } else {
            $this->Produit_m->updateProduit($id,$donnees);
            redirect('Produit_c/index');
        }
    }

    public function modifierProduit($id) {
        $this->check_droit(2);
        $this->load->view('head_v');
        $this->load->view('admin/navAdmin_v');
        $donnees=$this->Produit_m->getProduitById($id);
        $donnees['typeProduit']=$this->Produit_m->getTypeProduitDropdown();
        $this->load->view('admin/produit/form_update_produit_v',$donnees);
        $this->load->view('foot_v');
    }

    public function validFormModifierProduit() {
        $this->check_droit(2);
        $id=$this->input->post('id');
        $donnees= array(
            'nom'=>$this->input->post('nom'),
            'prix'=>$this->input->post('prix'),
            'id_type'=>$this->input->post('id_type'),
            'photo'=>$this->input->post('photo')
        );
        $this->form_validation->set_rules('id','id','trim|numeric');
        $this->form_validation->set_rules('nom','nom','trim|required|min_length[2]|max_length[12]');
        $this->form_validation->set_rules('prix', 'prix', 'trim|required|numeric');
        $this->form_validation->set_rules('id_type', 'type', 'required|callback_id_type_check');
        $this->form_validation->set_error_delimiters('<span class="error">','</span>');
        $donnees= array(
            'nom'=>$this->input->post('nom'),
            'prix'=>$this->input->post('prix'),
            'id_type'=>$this->input->post('id_type'),
            'photo'=>$this->input->post('photo')
        );
        if($this->form_validation->run() == False){
            $this->load->view('head_v');
            $this->load->view('admin/navAdmin_v');
            $donnees['id']=$id;
            $donnees['typeProduit']=$this->Produit_m->getTypeProduitDropdown();
            $this->load->view('admin/produit/form_update_produit_v',$donnees);
            $this->load->view('foot_v');
        } else {
            $this->Produit_m->updateProduit($id,$donnees);
            redirect('Produit_c/index');
        }
    }
}
