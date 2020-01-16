<?php

class Connexion_client extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index(){
        // loading utilities.
        $this->load->helper('security');
        // defines form_validation rules.
        $this->form_validation->set_rules('email', 'Adresse e-mail', 'trim|required|valid_email|xss_clean');
        $this->form_validation->set_rules('mdp', 'Mot de passe', 'required|min_length[8]|alpha_numeric|xss_clean');

        if ($this->form_validation->run() !== FALSE) {
            $this->load->model('login');
            $res = $this->login->get_user(
                        $this->input->post('email'),
                        $this->input->post('mdp')
                    );
        // var_dump($res); // database results test
        $pass = $this->input->post('mdp');
        $hash = $res->{'mdp'};

            if (password_verify($pass, $hash)) {
                if ($res->{"valide"} == 1) { // is profil validated ?

                    // INITIALISER LA SESSION ET PASSER LES DONNEES A LA VUE
                    // POUR AFFICHAGE ESPACE CLIENT.

                    // loading client_space
                    $this->load->view('templates/header');
                    $this->load->view('pages/client_space');
                    $this->load->view('templates/footer');
                }
                else {
                    $data['validation'] = " Nous somme désolés, votre inscription n'a pas encore été validée par un banquier.<br>Nous traiterons votre demande dans les plus brefs délais.";
                    $this->load->view('templates/header');
                    $this->load->view('pages/portail', $data);
                    $this->load->view('templates/footer');
                } // end condition validated profile
            }
            else {
                echo " Le mot de passe est incorrect";
            } // end condition password verify
        }
        else {
            $this->load->view('templates/header');
            $this->load->view('forms/form_connexion_client');
            $this->load->view('templates/footer');
        } // end condition validation runs
    } // end index();
}

?>
