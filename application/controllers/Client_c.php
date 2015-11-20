<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Client_c extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('form','url','text','string'));
        $this->load->library(array('session','form_validation','email'));
        $this->load->model('users_m');
    }

    public function index() {
        if($this->session->userdata('droit')!=1) redirect('users_c');
        $this->load->view('head_v');
        $this->load->view('clients/navClient_v');
        $data['titre'] = "Gestion de Panier";
        $this->load->view('clients/client_index', $data);
        $this->load->view('foot_v');
    }
}