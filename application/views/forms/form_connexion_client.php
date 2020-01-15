<main role="main" class="container bg-light">
    <div class="template">
        <form class="form-signin" method="post" action="connexion_client">
            <img class="mb-4" src="<?php echo base_url(); ?>assets/img/logo_picsou.png" alt="Logo de la banque picsou : une pièce d'un euro." width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Accéder à mon espace personnel</h1>
            <label for="email" class="sr-only">Email</label>
            <input type="email" name="email" class="form-control" placeholder="Adresse e-mail" required>
            <?php echo form_error('email'); ?>
            <label for="mdp" class="sr-only">Mot de passe</label>
            <input type="password" name="mdp" class="form-control" placeholder="Mot de passe" required>
            <?php echo form_error('mdp'); ?>
            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Se souvenir de moi
                </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block button_color" type="submit">connexion</button>
        </form>
    </div>
  </main>
