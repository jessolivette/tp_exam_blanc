<?php

class Client extends CI_Model {
    public function __construct() { }

    public function inscription_client($info) {
        $this->db->insert('client', $info);
    }
}

?>
