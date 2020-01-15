<?php

class Connexion_banker extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index(){
        // load utilities.
        $this->load->helper('security');
        // defines form_validation rules.
        $this->form_validation->set_rules('nom', 'Nom', 'trim|required|xss_clean');
        $this->form_validation->set_rules('code_perso', 'Code personnel', 'required|min_length[8]|alpha_numeric|xss_clean');

        if ($this->form_validation->run() !== FALSE) {
            $this->load->model('login');
            $res = $this->login->get_user(
                        $this->input->post('nom'),
                        $this->input->post('code_perso')
                    );
        // var_dump($res); // testing query result OK


        /* CODE DE REDIRECTION VERS LA PLATEFORME BANQUIERS */



        }
        else {
             $this->load->view('templates/header');
             $this->load->view('forms/form_connexion_banker');
             $this->load->view('templates/footer');
        }
    }
}

?>
