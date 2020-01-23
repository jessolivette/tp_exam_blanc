<?php

class Account extends CI_Model {

    public function __construct(){ }

    public function accountCreation($id){
        // generate random account number.
        $nb = 700;
        $nb .= $id;
        for ($i=0; $i < 8; $i++) {
          $nb .= random_int(000, 999);
        }

        $array = array(
            "n_compte" => $nb,
            "montant" => 1,
            "id_client" => $id,
            "id_banquier" => $_SESSION['id_banquier']
        );

        $this->db->insert('compte', $array);
    }

}

?>
