<main role="main" class="container">
    <div class="template bg-banker">
        <h1 class="h3 mb-3 font-weight-normal title">Mon espace Banquier</h1>
        <p class="lead"><?php echo $banquier; ?></p>
    </div>
    <hr class="mb-0">
    <div class="template bg-light">
        <h4 class="mb-4">Demandes d"inscription en attente</h4>
        <div class="container">
            <div class="row">
            <?php
            for($i=0; $i < count($res_client["nom"]); $i++) {
                echo '<div class="col-md-4">
                          <div class="card mb-4 shadow-sm">
                              <img src="'.$res_client["papier_identite"][$i].'" alt="prévisualisation papier identité client" class="banker-img">
                              <div class="card-body">
                                  <p class="card-text"><span class="bold-text">'.$res_client["nom"][$i]." ".$res_client["prenom"][$i].'</span></p>
                                  <p>'.$res_client["date_naissance"][$i].'<br>'.$res_client["email"][$i].'<br>'.$res_client["adresse_postale"][$i].'<br>'.$res_client["cp"][$i]." ".$res_client["ville"][$i].'<br>'.$res_client["pays"][$i].'</p>
                                  <input class="clientId" name="clientId" type="hidden" value="'.$res_client["id_client"][$i].'">
                                  <input type="button" class="btn btn-warning" value="Valider l\'inscription" ONCLICK="validateClient('.$i.')">
                              </div>
                          </div>
                      </div>';
            } ?>
            </div>
        </div>
    </div>
    <hr class="mb-0">
    <div class="template bg-light">
        <h4 class="mb-4">Mes clients</h4>
        <div class="container">
            <div class="row">
            </div>
        </div>
    </div>
    <hr class="mb-0">
</main>
