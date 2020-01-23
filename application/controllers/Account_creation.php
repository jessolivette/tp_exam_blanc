<?php
// echo "AAaaaarghhh ! PUTAIN !!"; // High Tone - Underground Wobble - full album.

class Account_creation extends CI_Controller {

  public function __construct() {
      parent::__construct();
  }

  public function index() {

      $cId = $_POST['client_id'];

      $this->load->model('client');

      $this->client->update_status($cId);
      $vc = json_encode($this->client->select_validated_client());
      // $this->account->accountCreation($cId);

  }
}
?>
