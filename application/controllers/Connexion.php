<?php

class Connexion extends CI_Controller {

    public function __construct(){
        parent::__construct();
    }

    public function client(){
        $labels = array( 'input_1' => 'Adresse e-mail', 'input_2' => 'Mot de passe');
      // redirection from home page for client, identification based on email and password.
        $this->load->view('templates/header');
        $this->load->view('forms/form_connexion', $labels);
        $this->load->view('templates/footer');
    }

    public function banker(){
        $labels = array( 'input_1' => 'Nom', 'input_2' => 'Code personnel');
      // redirection from home page for bankers, identification based on name and personal code.
      $this->load->view('templates/header');
      $this->load->view('forms/form_connexion', $labels);
      $this->load->view('templates/footer');
    }

    public function login_client(){ // function called to identify user, initialize session.
        $this->load->model('login'); // link with database.
    }

    public function login_banker(){ // called to identify banker, initilize session.
        $this->load->model('login');
    }
}

?>
