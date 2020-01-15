      <main role="main" class="container bg-light">
          <div class="template">
            <h1 class="title">Picsou Banque</h1>
            <img src="<?php echo base_url(); ?>assets/img/logo_picsou.png" alt="Logo de la banque picsou : une pièce d'un euro." class="logo-portail">
          </div>
          <div class="col-md-12 order-md-1">
              <h4 class="mb-3">Informations personnelles</h4>
              <form class="needs-validation" method="post" enctype="multipart/form-data" action="inscription" novalidate>
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="firstName">Nom</label>
                    <input type="text" class="form-control" name="nom" value="<?php echo set_value('nom'); ?>" required>
                    <?php echo form_error('nom'); ?>
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="lastName">Prénom</label>
                    <input type="text" class="form-control" name="prenom" value="<?php echo set_value('prenom'); ?>" required>
                    <?php echo form_error('prenom'); ?>
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="date_naissance">Date de naissance</label>
                    <input type="date" class="form-control" name="date_naissance" value="<?php echo set_value('date_naissance'); ?>" required>
                    <?php echo form_error('date_naissance'); ?>
                  </div>
                </div>

                <div class="mb-3">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" name="email" placeholder="you@example.com" value="<?php echo set_value('email'); ?>" required>
                  <?php echo form_error('email'); ?>
                </div>

                <div class="mb-3">
                  <label for="adresse">Adresse</label>
                  <input type="text" class="form-control" name="adresse" placeholder="12 rue des marguerittes" value="<?php echo set_value('adresse'); ?>" required>
                  <?php echo form_error('adresse'); ?>
                </div>

                <div class="row">
                  <div class="col-md-5 mb-3">
                    <label for="country">Pays</label>
                    <select class="custom-select d-block w-100" name="pays" required>
                      <option value="">Choose...</option>
                      <option>France</option>
                    </select>
                    <?php echo form_error('pays'); ?>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="state">Ville</label>
                    <input type="text" class="form-control" name="ville" value="<?php echo set_value('ville'); ?>" required>
                    <?php echo form_error('ville'); ?>
                  </div>
                  <div class="col-md-3 mb-3">
                    <label for="zip">Code postal</label>
                    <input type="text" class="form-control" name="cp" placeholder="11000" value="<?php echo set_value('cp'); ?>" required>
                    <?php echo form_error('cp'); ?>
                  </div>
                </div>

                <hr class="mb-4">
                <h4 class="mb-3">Choix du mot de passe</h4>
                <p>Pour être valide votre mot de passe doit contenir au moins 8 caractères dont au moins une lettre et un chiffre.<p>
                <div class="col-md-6 mb-3">
                  <label for="firstName">Mot de passe</label>
                  <input type="password" class="form-control" name="mdp" value="<?php echo set_value('mdp'); ?>" required>
                  <?php echo form_error('mdp'); ?>
                </div>

                <hr class="mb-4">
                <h4 class="mb-3">Pièce d'identité</h4>
                <p>Afin de créer votre compte, nous vous demandons de bien vouloir nous fournir le scan d'une pièce d'identité en cour de validité (passeport, carte nationnale d'identité).</p>
                <div class="mb-3">
                    <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
                    <input type="file" name="fichier" required>
                    <?php echo form_error('fichier'); ?>
                </div>
                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block button_color" type="submit">Envoyer ma demande d'inscription</button>
            </form>
            <hr class="mb-4">
            <div class="mb-4">
              <p>Votre demande sera traitée par un de nos banquiers dans les plus brefs délais, vous recevrez une confirmation par e-mail et pourrez dès lors vous connecter sur votre espace personnel.</p>
            </div>
        </div>
    </main>
