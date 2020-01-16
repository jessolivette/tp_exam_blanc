<?php

class Client extends CI_Model {
    public function __construct() { }

    public function inscription_client($info) { // new client insertion.
        $this->db->insert('client', $info);
    } // end insert function.

    public function select_client() {
        $q = $this->db
                  ->where('valide', 0)
                  ->get('client');

        $waiting_client = array(
            'nom' => array(),
            'prenom' => array(),
            'date_naissance' => array(),
            'email' => array(),
            'adresse_postale' => array(),
            'cp' => array(),
            'ville' => array(),
            'pays' => array(),
            'papier_identite' => array()
        );
        foreach ($q->result() as $row) {
            array_push($waiting_client['nom'], $row->nom);
            array_push($waiting_client['prenom'], $row->prenom);
            array_push($waiting_client['date_naissance'], $row->date_naissance);
            array_push($waiting_client['email'], $row->email);
            array_push($waiting_client['adresse_postale'], $row->adresse_postale);
            array_push($waiting_client['cp'], $row->cp);
            array_push($waiting_client['ville'], $row->ville);
            array_push($waiting_client['pays'], $row->pays);
            array_push($waiting_client['papier_identite'], $row->papier_identite);
        }
        return $waiting_client;
    } // end select function.
}

?>
