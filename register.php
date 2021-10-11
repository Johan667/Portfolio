<?php
require_once 'config/framework.php';
require_once 'config/connect.php';

// calculator pour eviter les robot : input ou je demande de faire un calcul et d'ecrire la reponse //

$error=null;

if(isset($_POST['token']) && $_POST['token'] === $_SESSION['token']){

    if(strlen($_POST['pseudo']) < 3 || strlen($_POST['pseudo']) > 30){
        echo '!! Erreur';
        }
        
        
        if(isset($_POST['pseudo']) && !empty($_POST['pseudo'])){
            var_dump($_POST); 
            echo "<br>Veuillez remplir le champ";
        }
        if(isset($_POST['email']) && !empty($_POST['email'])){
            var_dump($_POST); 
            echo "<br>Veuillez remplir le champ";
        }
        if(isset($_POST['password1']) && !empty($_POST['password1']) && $_POST['password1'] === $_POST['password2']){
            echo'boulette';
        }
        

}






?>





<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Connectez Vous!</title>
  </head>
  <body>
    <h1>Inscriver vous!</h1>



    <form method="POST">
        <input type="hidden" name="token" value="<?= miniToken(); ?>">

  <div class="form-group">

  <label for="pseudo">Pseudo</label>
    <input type="text" class="form-control" id="pseudo" name="pseudo" >
    
    <label for="exampleInputEmail1">Adresse e-mail</label>
    <input type="email" class="form-control" id="Email1" aria-describedby="emailHelp" name="email">
    <small id="emailHelp" class="form-text text-muted">Entrez une adresse valide svp</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Mot de passe</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password1">
  </div>
  <label for="exampleInputPassword2">Répétez le mot de passe</label>
    <input type="password" class="form-control" id="exampleInputPassword2" name="password2">
  </div><br>
 
  <button type="submit" class="btn btn-primary">Me Connecter</button>

</form>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
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