<?php

require_once 'config/framework.php';
require_once 'config/connect.php';

if (!isset($_SESSION['user'])) {
    redirectToRoute();
}


dump($_SESSION['user']);
echo 'bonjour '.$_SESSION['user']['pseudo'];



?>




<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Tableau de bord </title>
  </head>
  <body>
    <h1>Modification du compte</h1>



    <form method="POST">
        <input type="hidden" name="token" value="<?= miniToken(); ?>">

  <div class="form-group">

  <label for="pseudo">Modifier mon Pseudo</label>
    <input type="text" class="form-control" id="pseudo" name="pseudo" >
    
    <label for="exampleInputEmail1">Modifier mon Adresse e-mail</label>
    <input type="email" class="form-control" id="Email1" aria-describedby="emailHelp" name="email">
    <small id="emailHelp" class="form-text text-muted">Entrez une adresse valide svp</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Ancien Mot de passe</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password1">
  </div>
  <label for="exampleInputPassword2">Nouveau mot de passe</label>
    <input type="password" class="form-control" id="exampleInputPassword2" name="password2">
  </div><br>
  <label for="exampleInputPassword2">Répétez le Nouveau mot de passe</label>
    <input type="password" class="form-control" id="exampleInputPassword2" name="password2">
  </div><br>
 
  <button type="submit" class="btn btn-primary">Changez mes Informations</button>

</form><br>
<form action="" method="post">
    <input type="btn" name="datadelete" value="<?= $donnees['compte']; ?>">
    <button type="submit" name="formdelete">Supprimer le compte</button>
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