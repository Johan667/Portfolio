<?php

require_once 'config/framework.php';
require_once 'config/connect.php';

$errors = [];


if (!isset($_SESSION['user'])) {
  redirectToRoute();
}





// pour supprimer le compte
if (isset($_POST['token_delete']) && $_POST['token_delete'] === $_SESSION['token_delete']) {
  $sql = "DELETE FROM users WHERE id = '" . $_SESSION['user']['id'] . "'";
  if ($mysqli->query($sql) === true) {
    redirectToRoute('/deconnexion.php');
  }
}


// pour modifier le pseudo 
if (isset($_POST['token_pseudo']) && $_POST['token_pseudo'] === $_SESSION['token_pseudo']) {
  if (strlen($_POST['pseudo']) < 3 || strlen($_POST['pseudo']) > 30) {
    $errors['pseudo'] = 'Votre Pseudo doit contenir minimum 3 caractères et maximum 30 caracteres !';
  }
  if (empty($error)) {
    $sql = "UPDATE users SET pseudo='" . $_POST['pseudo'] . "' WHERE id='" . $_SESSION['user']['id'] . "'";
    if ($mysqli->query($sql) === true) {
      $_SESSION['user']['pseudo'] = $_POST['pseudo'];
    } else {
      $errors['sql'] = 'une erreur est survenue. Veuillez recommencer';
    }
  }
}


// pour modifier l'email

if (isset($_POST['token_email']) && $_POST['token_email'] === $_SESSION['token_email']) {
  if (isset($_POST['email']) && preg_match('#^[\w.-]+@[\w.-]+\.[a-z]{2,6}$#i', $_POST['email'])) {
    $errors['email'] = 'Votre Pseudo doit contenir minimum 3 caractères et maximum 30 caracteres !';
    $sql = "UPDATE users SET email='" . $_POST['email'] . "' WHERE id = '" . $_SESSION['user']['id'] . "'";
    if ($mysqli->query($sql) === true) {
      redirectToRoute('/deconnexion.php');
    } else {
      echo 'une erreur est survenue. Veuillez recommencer';
    }
  }
}

// pour modifier le mdp
if (isset($_POST['token_password']) && $_POST['token_password'] === $_SESSION['token_password']) {
  $password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $sql = "UPDATE users SET password='" . $password_hash . "' WHERE id = '" . $_SESSION['user']['id'] . "'";
  if ($mysqli->query($sql) === true) {
    redirectToRoute('/deconnexion.php');
  } else {
    echo 'une erreur est survenue. Veuillez recommencer';
  }
}




require_once 'part/header.php';
?>
<div id="hero" class="hero">
  <header></header>

  <main id="main">
    <section class="site-section section-about text-center">
      <div class="container my-5">
        <h2> <strong> Ravi de vous revoir <?= $_SESSION['user']['pseudo']; ?></strong></h2><br>
        <div class="row">

          <div class="col-md-4 col-md-offset-4">

            <form class="form-inline" method="post">
              <div class="form-group mx-sm-3 mb-3">
                <label for="emailmodif" class="sr-only">Email</label>
                <input type="hidden" name="token_email" value="<?= miniToken('token_email'); ?>">
                <input type="text" class="form-control" name="email" id="modifemail" placeholder="Nouvelle email">
              </div>
              <button type="submit" class="btn btn-secondary mb-2">Modifier L'email</button><br>
            </form>

            <form class="form-inline" method="post">
              <div class="form-group mx-sm-3 mb-3">
                <label for="pseudomodif" class="sr-only">Pseudo</label>
                <input type="hidden" name="token_pseudo" value="<?= miniToken('token_pseudo'); ?>">
                <input type="text" class="form-control" name="pseudo" id="modifpseudo" placeholder="Nouveau Pseudo">
              </div>
              <button type="submit" class="btn btn-secondary mb-2">Modifier le Pseudo</button><br>
            </form>

            <form class="form-inline" method="post">
              <div class="form-group mx-sm-3 mb-3">
                <label for="passwordmodif" class="sr-only">Mot de passe</label>
                <input type="hidden" name="token_password" value="<?= miniToken('token_motdepasse'); ?>">
                <input type="password" class="form-control" name="password" id="modifpassword" placeholder="Nouveau Mot de Passe">
              </div>
              <button type="submit" class="btn btn-secondary mb-2">Modifier le mot de passe</button><br>
            </form><br>

            <em>OU</em><br>


            <form method="post" onclick="return confirm('Vous êtes sûre de vouloir nous quitter ? :(')">

              <input type="hidden" name="token_delete" value="<?= miniToken('token_delete'); ?>">
              <input type="submit" name="delete" value="Supprimer le Compte" class="btn btn-danger">

            </form><br>

            <a href="politiquergpd.php">Politique de confidentialité</a>
    </section>
  </main>
</div>

</html>