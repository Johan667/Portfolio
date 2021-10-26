<?php

require_once 'config/framework.php';
require_once 'config/connect.php';
require_once 'part/header.php';

$errors = [];


if (isset($_POST['email'])) {
    $email = strip_tags(stripslashes($_REQUEST['email']));
    $query = "SELECT * FROM `users` WHERE email='" . $email . "'";

    if ($result = $mysqli->query($query)) {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if (password_verify($_POST['password1'], $row['password'])) {
                    $_SESSION['user'] = $row;
                    if ($_POST['souvenir'] === 'on') {
                        $expire = time() + 1 * 1 * 900;
                        setcookie('souvenir', $row['security'], $expire, '/', '', false, true);
                    }
                    redirectToRoute('/compte.php');
                } else {
                    echo 'compte non reconnu';
                }
            }
        }
        $result->close();
    }
}



?>
<div id="hero" class="hero">
    <main id="main">
        <section class="site-section section-about text-center">
            <div class="container my-5">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">
                            Connectez vous
                        </p>

                        <form class="mx-1 mx-md-4" method="post">
                            <input type="hidden" name="token" value="<?= miniToken(); ?>">


                            <label class="form-label" for="email">E-mail</label>
                            <div class="d-flex flex-row align-items-center mb-4">
                                <div class="form-outline flex-fill mb-0">
                                    <input type="email" class="form-control" name="email" id="email" />
                                </div>
                            </div>

                            <label class="form-label" for="password">Mot de passe</label><br>
                            <div class="d-flex flex-row align-items-center mb-4">

                                <div class="form-outline flex-fill mb-0">
                                    <input type="password" class="form-control" name="password1" id="password1" />

                                </div>
                            </div>


                            <div id="hero" class="hero">
                                <div class="d-flex justify-content-center m-4 my-5">
                                    <button type="submit" class="btn btn-primary">Se connecter</button>
                                </div>


                                <input type="checkbox" name="souvenir" id="souvenir" />
                                <label for="souvenir">
                                    <p>Rester connecté</p>
                                </label>

                        </form>

                        <div><a href="/register.php">Pas de compte ? S'inscrire</a></div>
                    </div>
                </div>
            </div>
</div>
</section>

</main>
