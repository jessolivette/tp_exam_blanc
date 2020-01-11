<?php

class Inscription extends CI_Controller {

    public function __construct(){
        parent::__construct();
    }

    public function index(){
      // chargement automatique à chaque appel de la classe.
      $this->load->helper('security');
      // définition des règles de validation et sanitisation des entrées utilisateur.
      $this->form_validation->set_rules('nom', 'Nom', 'trim|required|alpha_numeric_spaces|xss_clean');
      $this->form_validation->set_rules('prenom', 'Prénom', 'trim|required|alpha_numeric_spaces|xss_clean');
      $this->form_validation->set_rules('date_naissance', 'Date de naissance', 'required|xss_clean');
      $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean');
      $this->form_validation->set_rules('adresse', 'Adresse postale', 'trim|required|xss_clean');
      $this->form_validation->set_rules('pays', 'Pays', 'trim|required|alpha|xss_clean');
      $this->form_validation->set_rules('ville', 'Ville', 'trim|required|alpha|xss_clean');
      $this->form_validation->set_rules('cp', 'Code postal', 'trim|required|numeric|xss_clean');
      $this->form_validation->set_rules('mdp', 'Mot de passe', 'required|min_length[8]|alpha_numeric|xss_clean');
      // $this->form_validation->set_rules('fichier', 'Papier d\'identité', 'required|sanitize_filename');

      if ($this->form_validation->run() !== FALSE){

        // récupération et traitement du fichier utilisateur
        $ext_autorisees = array('jpeg', 'jpg', 'pdf');
        $nom_origine = $_FILES['fichier']['name'];
        $get_ext = new SplFileInfo("$nom_origine");
        $ext_fichier = $get_ext->getExtension();

        if (!(in_array($ext_fichier, $ext_autorisees))) {
          echo "le fichier doit avoir l'extention : .jpeg, .jpg ou .pdf";
        } // end if (vérification du format du fichier)
        else {
          // renomage et copie dans le répertoire de destination.
          $new_name = "identite_client_".$this->input->post('nom')."_".date('YmdHis').".".$ext_fichier;
          $destination = "../goldfish/".$new_name;
          if (move_uploaded_file($_FILES['fichier']['tmp_name'], $destination)) {
              echo "Le fichier temporaire ".$_FILES["fichier"]["tmp_name"].
                " a été déplacé.";

              // hachage mot de passe et récupération des données utilisateur
              $hash_pass = password_hash('$this->input->post(\'mdp\')', PASSWORD_BCRYPT);
              $info = array(
                  'nom' => $this->input->post('nom'),
                  'prenom' => $this->input->post('prenom'),
                  'date_naissance' => $this->input->post('date_naissance'),
                  'email' => $this->input->post('email'),
                  'mdp' => $hash_pass,
                  'adresse_postale' => $this->input->post('adresse'),
                  'cp' => $this->input->post('cp'),
                  'ville' => $this->input->post('ville'),
                  'pays' => $this->input->post('pays'),
                  'papier_identite' => $destination,
                  'valide' => 0
              );
              // var_dump($info); // test vérification de la récupération des données

              // chargement du model Client et transfer des variables pour insertion.
              $this->load->model('client');
              $this->client->inscription_client($info);
              // renvoie l'utilisateur sur la page d'accueil.
              $this->load->view('templates/header');
              $this->load->view('pages/'.$page);
              $this->load->view('templates/footer');

          }
          else { // si l'upload a échoué.
              echo "Le fichier n'a pas été uploadé (trop gros ?) ou ".
                  "Le déplacement du fichier temporaire a échoué.";
          }
        } // end if else

      } // end if (form_validation run)
      else {
          $this->load->view('templates/header');
          $this->load->view('forms/form_inscription');
          $this->load->view('templates/footer');
      } // recharge le formulaire si les champs ne sont pas valides
    } // end index()
}

?>
