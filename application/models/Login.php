<?php

class Login extends CI_Model {
    public function __construct() { }

    // search and get registered user (client or banker) in database using mail adress and password
    public function get_user($param_1, $param_2) {

        $q = $this->db
                  ->where('email', $param_1)
                  ->limit(1)
                  ->get('client');

        $q1 = $this->db
                  ->where('nom', $param_1)
                  ->where('code_perso', $param_2)
                  ->limit(1)
                  ->get('banquier');

        if($q->num_rows() > 0){ // if result is in client.
            return $q->row();
        }
        else if($q1->num_rows() > 0) { // if result is in banquier.
            return $q1->row();
        }
        else { // if no result.
            return false;
        }
    } // end get_user();

}

?>
