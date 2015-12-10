<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Users_c extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('form','url','text','string'));
        $this->load->library(array('session','form_validation','email'));
        $this->load->model(array('Users_m','Panier_m'));
    }

    public function check_droit(){
        if( $this->session->userdata('droit')==2) redirect('Admin_c');
        if( $this->session->userdata('droit')==1) redirect('Client_c');
    }

    public function index() {
        $this->check_droit();
        $this->load->view('head_v');
        $this->load->view('nav_v');
        $this->load->view('foot_v');
    }

    public function aff_connexion() {
        $this->check_droit();
        $this->load->view('head_v');
        $this->load->view('nav_v');
        $this->load->view('form_connexion_v');
        $this->load->view('foot_v');
    }

    public function form_valid_connexion() {
        $this->check_droit();
        $this->form_validation->set_rules('login','login','trim|required');
        $this->form_validation->set_rules('pass','Mot de passe','trim|required');
        $donnees= array(
            'login'=>$this->input->post('login'),
            'pass'=>md5($this->input->post('pass'))
        );
        if($this->form_validation->run() == False){
            $this->load->view('head_v');
            $this->load->view('nav_v');
            $this->load->view('form_connexion_v',$donnees);
            $this->load->view('foot_v');
        } else {
            $donnees_session = array();
            if(($donnees_session = $this->Users_m->verif_connexion($donnees)) != False) {
                $this->session->set_userdata($donnees_session);
                $panier = $this->Panier_m->getPanier($this->session->userdata('id_user'));
                $date = date("Y-m-d H:i:s");
                $jour = intval($date['8'].$date['9']) - 1;
                $date['8'] = floor($jour/10);
                $date['9'] = $jour%10;
                foreach ($panier as $value) {
                    if ($value->dateAjoutPanier > $date) redirect('Users_c');
                }
                $this->Panier_m->deletePanier($this->session->userdata('id_user'));
                redirect('Users_c');
            } else {
                $donnees['erreur']="mot de passe ou login incorrect";
                $this->load->view('head_v');
                $this->load->view('nav_v');
                $this->load->view('form_connexion_v',$donnees);
                $this->load->view('foot_v');
            }
        }
    }

    public function deconnexion() {
        $this->session->sess_destroy();
        redirect('Users_c');
    }

    public function inscription() {
        $this->check_droit();
        $this->load->view('head_v');
        $this->load->view('nav_v');
        $donnees['titre']="inscription";
        $this->load->view('users_inscription',$donnees);
        $this->load->view('foot_v');
    }

    public function validFormInscription() {
        $this->form_validation->set_rules('login','login','trim|required|is_unique[user.login]');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('pass','Mot de passe','trim|required|matches[pass2]');
        $this->form_validation->set_rules('pass2','Mot de passe','trim|required');
        $donnees= array(
            'login'=>$this->input->post('login'),
            'email'=>$this->input->post('email'),
            'pass'=>md5($this->input->post('pass'))   // encryptage MD5 ou autre à faire
        );
        if($this->form_validation->run() == False){
            $this->load->view('head_v');
            $this->load->view('nav_v');
            $donnees['titre']="inscription";
            $this->load->view('users_inscription',$donnees);
            $this->load->view('foot_v');
        } else {
            $donnees['droit']=1;
            $donnees['valide']=0;
            $this->Users_m->add_user($donnees);
            redirect(base_url());
        }
    }

    public function mdp_oublie() {
        $this->load->view('head_v');
        $this->load->view('nav_v');
        $donnees['titre']="mot de passe oublié";
        $this->load->view('users_mdp_oublie',$donnees);
        $this->load->view('foot_v');
    }

    public function check_email($email) {
        if ($this->Users_m->test_email($email) != TRUE) {
            $this->form_validation->set_message('check_email', 'Le %s n\'existe pas ');
            return FALSE;
        } else return TRUE;
    }

    public function validFormMdpOublie() {
        $this->form_validation->set_rules('email','Email','trim|required|valid_email||callback_check_email');
        $donnees= array(
            'email'=>$this->input->post('email')
        );
        if($this->form_validation->run() == False){
            $this->load->view('head_v');
            $this->load->view('nav_v');
            $donnees['titre']="mot de passe oublié";
            $this->load->view('users_mdp_oublie',$donnees);
            $this->load->view('foot_v');
        } else {
            $this->email->from('noreply@monsite.com','Mon site');
            $this->email->to($donnees['email'],'mot de passe oublié');
            $this->email->subject('votre mot de passe');
            $motdepasse=mt_rand(100000,1000000);
            $this->email->message('<p>voici un nouveau de passe </p>....'.$motdepasse);
            $this->email->send();
            $data['pass']=$motdepasse;
            $this->Users_m->modif_email_mdp($donnees['email'],$data);
            redirect(base_url());
        }
    }
}