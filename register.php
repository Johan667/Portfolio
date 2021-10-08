<?php

require_once 'config/framework.php';
require_once 'config/connect.php';

$errors = [];

if(isset($_POST['token']) && $_POST['token'] === $_SESSION['token']){

    if(strlen($_POST['pseudo']) < 3 || strlen($_POST['pseudo']) > 30){
        $errors['pseudo'] = 'Votre Pseudo doit contenir minimum 3 caractères et maximum 30 caracteres !';
      }
        
        if(isset($_POST['pseudo']) && !empty($_POST['pseudo'])){
            dump($_POST); 
            
        }
        if(isset($_POST['email']) && !empty($_POST['email'])){
           dump($_POST ,true); 
            
        }
        if(isset($_POST['password1']) && !empty($_POST['password1']) && $_POST['password1'] === $_POST['password2']){
            
        }

        if (empty($errors)) {
          $password_hash = password_hash($_POST['password1'], PASSWORD_DEFAULT);
          dump($password_hash);
          $sql= "INSERT INTO users(email, password, pseudo, roles) VALUES ('value-1','".$password_hash."','value-3','".json_encode(['ROLE_USER'])."')";
          if ($mysqli->query($sql) === true) {
            redirectToRoute();
          } else {
            echo 'gg';
          }
        }
        else {
          echo 'pas bon :/';
        }
      }

?>

<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Johan Kasri</title>
  </head>
 

  <body>
    <div class="m-a">
      <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1 m-auto">
        <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">
         <em> Créer un compte</em>
        </p>

        <form class="mx-1 mx-md-4" method="post" >
          <input type="hidden"name="token" value="<?= miniToken(); ?>">
          <div class="d-flex flex-row align-items-center mb-4">
            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
            <div class="form-outline flex-fill mb-0">
            <label class="form-label" for="pseudo">Pseudo</label>
              <input type="text"  class="form-control" name="pseudo" id="pseudo"/>
             
            </div>
          </div>

          <div class="d-flex flex-row align-items-center mb-4">
            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
            <div class="form-outline flex-fill mb-0">
            <label class="form-label" for="email">E-mail</label>
              <input type="email"  class="form-control" name="email" id="email"/>
              
            </div>
          </div>

          <div class="d-flex flex-row align-items-center mb-4">
            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
            <div class="form-outline flex-fill mb-0">
            <label class="form-label" for="password">Mot de passe</label>
              <input type="password"  class="form-control"  name="password1" id="password1"/>
             
            </div>
          </div>

          <div class="d-flex flex-row align-items-center mb-4">
            <i class="fas fa-key fa-lg me-3 fa-fw"></i>
            <div class="form-outline flex-fill mb-0">
            <label class="form-label" for="password2"
                >Confirmer votre mot de passe</label>
              <input type="password"  class="form-control" name="password2" id="password2"/>
                
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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->

  </body>

</html>