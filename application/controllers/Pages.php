<?php
class Pages extends CI_Controller {

public function view($page = 'portail') {

    if( ! file_exists(APPPATH.'views/pages/'.$page.'.php')) {
      show_404(); // check wether the requested page exists and return an error when it does'nt.
    }

    $this->load->view('templates/header');
    $this->load->view('pages/'.$page);
    $this->load->view('templates/footer');

  }
}

?>
