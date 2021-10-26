<?php
require_once 'config/framework.php';
require_once 'config/connect.php';
require_once 'part/header.php';


$errors = [];

if (isset($_POST['token']) && $_POST['token'] === $_SESSION['token']) {

  if (strlen($_POST['pseudo']) < 3 || strlen($_POST['pseudo']) > 30) {
    $errors['pseudo'] = 'Votre Pseudo doit contenir minimum 3 caractères et maximum 30 caracteres !';
  }

  if (isset($_POST['email']) && !preg_match('#^[\w.-]+@[\w.-]+\.[a-z]{2,6}$#i', $_POST['email'])) {
    $errors['email'] = 'Votre Pseudo doit contenir minimum 3 caractères et maximum 30 caracteres !';
  }

  if (isset($_POST['password1']) && !empty($_POST['password1']) && $_POST['password1'] === $_POST['password2']) {
    $password_hash = password_hash($_POST['password1'], PASSWORD_DEFAULT);
  } else {
    $errors['password1'] = 'Les mots de passe ne sont pas identiques !';
  }

  if (empty($errors)) {
    $sql = "INSERT INTO users(email, password, pseudo, roles) VALUES ('" . $_POST['email'] . "','" . $password_hash . "','" . $_POST['pseudo'] . "','" . json_encode(['ROLE_USER']) . "')";
    if ($mysqli->query($sql) === true) {
      redirectToRoute();
    } else {
      echo 'une erreur est survenue. Veuillez recommencer';
    }
  }
}

?>

<title>Inscrivez Vous !</title>



<main id="main">
  <section class="site-section section-about text-center">
    <div class="container my-5">
      <div class="row">
        <div class="col-md-4 col-md-offset-4">
          <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">
            Inscrivez vous !



          <form method="POST">
            <input type="hidden" name="token" value="<?= miniToken(); ?>">

            <div class="form-group">

              <label for="pseudo">Pseudo</label>
              <input type="text" class="form-control" id="pseudo" name="pseudo">

              <label for="exampleInputEmail1">Adresse e-mail</label>
              <input type="email" class="form-control" id="Email1" aria-describedby="emailHelp" name="email">

            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Mot de passe</label>
              <input type="password" class="form-control" id="exampleInputPassword1" name="password1">
            </div>
            <label for="exampleInputPassword2">Répétez le mot de passe</label>
            <input type="password" class="form-control" id="exampleInputPassword2" name="password2"><br>
            <button type="submit" class="btn btn-secondary">M'inscrire</button>
        </div>





        </form>
      </div>

    </div>

    </div>
  </section>
</main>
<?php


$pseudo = valid_donnees($_POST["pseudo"]);
$email = valid_donnees($_POST["email"]);
$password = valid_donnees($_POST["password"]);

function valid_donnees($donnees)
{
  $donnees = trim($donnees);
  $donnees = stripslashes($donnees);
  $donnees = htmlspecialchars($donnees);
  return $donnees;
}
?>
<?php require_once 'part/footer.php';
