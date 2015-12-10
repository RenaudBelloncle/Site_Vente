<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Client_c extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('form','url','text','string'));
        $this->load->library(array('session','form_validation','email'));
        $this->load->model(array('Commande_m', 'Users_m'));
    }

    public function index() {
        if($this->session->userdata('droit')!=1) redirect('users_c');
        $this->load->view('head_v');
        $this->load->view('clients/navClient_v');
        $data['titre'] = "Gestion de Panier";
        $this->load->view('clients/client_index', $data);
        $this->load->view('foot_v');
    }

    public function afficherCompte(){
        $this->load->view('head_v');
        $this->load->view('clients/navClient_v');
        $donnees['user']=$this->Users_m->getUserById($this->session->userdata('id_user'));
        $donnees['commande'] = $this->Commande_m->getCommandeByUser($this->session->userdata('id_user'));
        $this->load->view('clients/compte/detail_compte_v',$donnees);
        $this->load->view('foot_v');
    }

    public function modifierCompte(){
        $this->load->view('head_v');
        $this->load->view('clients/navClient_v');
        $donnees['user']=$this->Users_m->getUserById($this->session->userdata('id_user'));
        $this->load->view('clients/compte/modifier_compte_v',$donnees);
        $this->load->view('foot_v');
    }

    public function validFormModifierCompte() {
        $id = $this->input->post('id_user');
        $donnees['user']= array(
            'login'=>$this->input->post('login'),
            'code_postal'=>$this->input->post('code_postal'),
            'email'=>$this->input->post('email'),
            'nom'=>$this->input->post('nom'),
            'prenom'=>$this->input->post('prenom'),
            'adresse'=>$this->input->post('adresse'),
            'ville'=>$this->input->post('ville'),
            'password'=>$this->input->post('password')
        );
        $this->form_validation->set_rules('id_user','id_user','trim|numeric');
        $this->form_validation->set_rules('nom','nom','trim|min_length[2]|max_length[12]');
        $this->form_validation->set_rules('prenom','prenom','trim|min_length[2]|max_length[12]');
        $this->form_validation->set_rules('login','login','trim|required|min_length[2]|max_length[12]');
        $this->form_validation->set_rules('email','email','trim|required|min_length[7]|max_length[50]');
        $this->form_validation->set_rules('password','password','trim|required|min_length[2]|max_length[12]');
        $this->form_validation->set_rules('adresse','adresse','trim|min_length[5]|max_length[50]');
        $this->form_validation->set_rules('ville','ville','trim|min_length[2]|max_length[20]');
        $this->form_validation->set_rules('code_postal', 'code_postal', 'trim|numeric|min_length[5]|max_length[5]');
        $this->form_validation->set_error_delimiters('<span class="error">','</span>');
        $donnees['user']= array(
            'login'=>$this->input->post('login'),
            'code_postal'=>$this->input->post('code_postal'),
            'email'=>$this->input->post('email'),
            'nom'=>$this->input->post('nom'),
            'prenom'=>$this->input->post('prenom'),
            'adresse'=>$this->input->post('adresse'),
            'ville'=>$this->input->post('ville'),
            'password'=>md5($this->input->post('password'))
        );
        if($this->form_validation->run() == False){
            $this->load->view('head_v');
            $this->load->view('clients/navClient_v');
            $donnees['user'] = array(
                'id_user'=>$id,
                'login'=>$this->input->post('login'),
                'code_postal'=>$this->input->post('code_postal'),
                'email'=>$this->input->post('email'),
                'nom'=>$this->input->post('nom'),
                'prenom'=>$this->input->post('prenom'),
                'adresse'=>$this->input->post('adresse'),
                'ville'=>$this->input->post('ville'),
                'password'=>md5($this->input->post('password'))
            );
            $this->load->view('clients/compte/modifier_compte_v',$donnees);
            $this->load->view('foot_v');
        } else {
            $this->Users_m->updateCompte($id, $donnees);
            redirect('Client_c/afficherCompte');
        }
    }

    public function check_mdp($password){
        if ($this->Users_m->test_mdp($password, $this->session->userdata('id_user')) != TRUE) {
            $this->form_validation->set_message('check_mdp', 'Mauvais mot de passe');
            return FALSE;
        } else return TRUE;
    }

    public function modifierMdp(){
        $this->load->view('head_v');
        $this->load->view('clients/navClient_v');
        $donnees['user']=$this->Users_m->getUserById($this->session->userdata('id_user'));
        $this->load->view('clients/compte/modifier_mdp_v',$donnees);
        $this->load->view('foot_v');
    }

    public function validFormModifierMdp() {

        $id = $this->input->post('id_user');
        $donnees['user']= array(
            'password'=>md5($this->input->post('password'))
        );
        $this->form_validation->set_rules('ancienPass','ancienPass','trim|required|min_length[2]|max_length[12]|callback_check_mdp');
        $this->form_validation->set_rules('password','password','trim|required|matches[pass]');
        $this->form_validation->set_rules('pass','pass','trim|required');
        $this->form_validation->set_error_delimiters('<span class="error">','</span>');
        $donnees['user']= array(
            'password'=>md5($this->input->post('password'))
        );
        if($this->form_validation->run() == False){
            $this->load->view('head_v');
            $this->load->view('clients/navClient_v');
            $donnees['user'] = array(
                'id_user'=>$id,
                'password'=>md5($this->input->post('password'))
            );
            $this->load->view('clients/compte/modifier_mdp_v',$donnees);
            $this->load->view('foot_v');
        } else {
            $this->Users_m->updateCompte($id, $donnees);
            redirect('Client_c/afficherCompte');
        }
    }

}