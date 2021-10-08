<?php
// http://localhost:8000

require_once 'config/framework.php';
require_once 'config/connect.php';

$error=null;


if (isset($_POST['token']) && $_POST['token'] === $_SESSION['token']) {
  if(isset($_POST['pseudo']) && !empty($_POST['pseudo'])){
    echo "<br>Veuillez remplir le champ";
  }
  if (strlen($_POST['pseudo']) < 4 ) {
    echo '<br>Pseudo trop petit';
  }
  if (30< strlen($_POST['pseudo'])) {
    echo '<br>Pseudo trop grand';
  }
  if(isset($_POST['email']) && !empty($_POST['email'])){
      echo "<br>Veuillez remplir le champ";
  }
  if(isset($_POST['password']) && !empty($_POST['password'])){
    echo'<br>Mot de passe incorrecte';
  }
  if($_POST['password'] === $_POST['passwordConf'] ){
    echo'<br>Ce ne sont pas les même mots de passe';
  }
}








?>




<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    />

    <title>S'identifier</title>
  </head>
  <body>
    <div class="m-a">
      <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1 m-auto">
        <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">
          Identifiez Vous 
        </p>

        <form class="mx-1 mx-md-4" method="post" >
          <input type="hidden"name="token" value="<?= miniToken(); ?>">
          <div class="d-flex flex-row align-items-center mb-4">
            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
            <div class="form-outline flex-fill mb-0">
              <input type="text"  class="form-control" name="pseudo" id="pseudo"/>
              <label class="form-label" for="pseudo">Pseudo</label>
            </div>
          </div>

          <div class="d-flex flex-row align-items-center mb-4">
            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
            <div class="form-outline flex-fill mb-0">
              <input type="email"  class="form-control" name="email" id="email"/>
              <label class="form-label" for="email">E-mail</label>
            </div>
          </div>

          <div class="d-flex flex-row align-items-center mb-4">
            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
            <div class="form-outline flex-fill mb-0">
              <input type="password"  class="form-control"  name="password" id="password"/>
              <label class="form-label" for="password">Mot de passe</label>
            </div>
          </div>

          
          </div>

          <div class="d-flex justify-content-center m-4">
            <button type="submit" class="btn btn-primary ">S'inscrire</button>
          </div>
          
        </form>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>