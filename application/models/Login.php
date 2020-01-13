<?php

class Login extends CI_Model {
    public function __construct() { }

    // search and get existing client in database using mail adress and password
    public function get_client($mdp, $email) {
        $this->db->select('*');
        $this->db->from('client');
        $this->db->where('input_1', $email);
        $this->db->where('input_2', $mdp);
        $q = this->db->get();
    }
}

?>
