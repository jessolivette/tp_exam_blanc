<?php

class Form_inscription extends CI_Controller {

    public function __construct() {
       parent::__construct();
    }

    public function index(){
      $this->load->view('templates/header');
      $this->load->view('forms/form_inscription');
      $this->load->view('templates/footer');
    }

}

?>
