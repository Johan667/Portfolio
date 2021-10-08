<?php

require_once 'config/framework.php';
require_once 'config/connect.php';
// session_start(); //
$errors = [];


        if (isset($_POST['email'])){
          $email = strip_tags(stripslashes($_REQUEST['email']));
          //$username = mysqli_real_escape_string($sql, $_POST['email']);
          //$password = stripslashes($_REQUEST['password1']);
          //$password = mysqli_real_escape_string($sql, $password1);
          $query = "SELECT * FROM `users` WHERE email='".$email."'";

          if ($result = $mysqli->query($query)) {
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  if (password_verify($_POST['password1'], $row['password'])) {
                    $_SESSION['user'] = $row;
                    redirectToRoute('/compte.php');
                  } else {
                    echo 'compter non reconnu';
                  }
                }
            }
            $result->close();
        }

          /*
          $result = mysqli_query($sql,$query) ;
          $rows = mysqli_num_rows($result);
          if($mysqli->query($sql) === true) {
                redirectToRoute();
          }else{
            $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
          }
          */
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
         <em> Connectez Vous</em>
        </p>

        <form class="mx-1 mx-md-4" method="post" >
          <input type="hidden"name="token" value="<?= miniToken(); ?>">

          <div class="d-flex flex-row align-items-center mb-4">
            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
            <label class="form-label" for="email">E-mail</label>
            <div class="form-outline flex-fill mb-0">          
              <input type="email"  class="form-control" name="email" id="email"/>
              
            </div>
          </div>

          <div class="d-flex flex-row align-items-center mb-4">
            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
            <label class="form-label" for="password">Mot de passe</label>
            <div class="form-outline flex-fill mb-0">
              <input type="password"  class="form-control"  name="password1" id="password1"/>
             
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