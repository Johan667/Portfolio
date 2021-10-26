<?php

require_once 'config/framework.php';
require_once 'config/connect.php';
require_once 'part/header.php';


$sql = "SELECT P.id, P.titre, P.slug, P.content, P.image, P.creation, U.pseudo 
        FROM projets AS P 
        INNER JOIN users AS U 
            ON U.id = P.auteur 
        WHERE P.slug = '" . $_GET['slug'] . "' LIMIT 1";
$projets = query($sql, true);

if (!empty($projets)) {
    $sql = "SELECT C.comment, U.pseudo 
        FROM commentaires AS C  
        INNER JOIN users AS U 
            ON U.id = C.user 
        WHERE C.projet = '" . $projets['id'] . "'";
    $commentaires = query($sql);
}

if (isset($_POST['token_comment']) && $_POST['token_comment'] === $_SESSION['token_comment']) {
    $commentaire = addslashes(htmlentities(strip_tags($_POST['token_comment'])));
    $sql = "INSERT INTO commentaires(user,projet,comment) VALUES ('" . $_SESSION['user']['id'] . "', '" . $projets['id'] . "','" . $_POST['comment'] . "')";
    if ($mysqli->query($sql)) {
        addFlash('success', 'Votre commentaire a bien été envoyé !!');
        redirectToRoute('/projet.php?slug=' . $_GET['slug']);
    } else {
        addFlash('danger', 'Votre commentaire n\'a pas été envoyé !!');
    }
}

?>


<div id="hero" class="hero">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="comprojet">
                    <div class="jumbotron jumbotron-fluid">
                        <div class="container">

                            <?php if (!empty($projets)) { ?>

                                <h1 class="display-4"><?= $projets['titre'] ?></h1>
                                <p class="lead"><img src="<?= $projets['image'] ?>"></p>
                                <?= $_GET['slug']; ?>
                                <br>
                                <?= $page = isset($_GET['page']) && (int) $_GET['page'] ? $_GET['page'] : 1;
                                $projets['image']; ?>
                                <br>
                                <br>
                                <?= $projets['content'];
                                $page; ?>
                                <br>
                                <?= $projets['creation']; ?>

                            <?php } else {
                                echo 'Le projet est indisponible';
                            }
                            ?>
                            <br>
                        </div>
                    </div>
                </div>


                <?php if (!empty($projets)) { ?>
                    <div class="comcom">
                        <div class="container">
                            <div class='row'>
                                <div class='col-md-offset-2 col-md-8'>
                                    <div class="carousel slide" data-ride="carousel" id="quote-carousel">
                                        <!-- Bottom Carousel Indicators -->
                                        <ol class="carousel-indicators">
                                            <?php $i = 0;
                                            foreach ($commentaires as $commentaire) : ?>
                                                <li data-target="#quote-carousel" data-slide-to="<?= $i; ?>" class="<?= $i === 0 ? 'active' : ''; ?>"></li>
                                            <?php $i++;
                                            endforeach; ?>
                                        </ol>

                                        <!-- Carousel Slides / Quotes -->
                                        <div class="carousel-inner">

                                            <!-- comS -->
                                            <?php $i = 0;
                                            foreach ($commentaires as $commentaire) : ?>
                                                <div class="item<?= $i === 0 ? ' active' : ''; ?>">
                                                    <blockquote>
                                                        <div class=" row">
                                                            <div class="col-sm-9">
                                                                <p>"<?= $commentaire['comment']; ?>"
                                                                    <br>
                                                                    __<br>

                                                                    <strong>De <?= $commentaire['pseudo']; ?></strong>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </blockquote>
                                                </div>
                                            <?php $i++;
                                            endforeach; ?>


                                        </div>

                                        <!-- Carousel Buttons Next/Prev -->
                                        <a data-slide="prev" href="#quote-carousel" class="left carousel-control"><i class="fa fa-chevron-left"></i></a>
                                        <a data-slide="next" href="#quote-carousel" class="right carousel-control"><i class="fa fa-chevron-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="comcom">
                        <a class="btn btn-dark" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                            Commentez
                        </a>
                        <div class="collapse" id="collapseExample">
                            <div class="card card-body">
                                <?php if (isset($_SESSION['user'])) { ?>
                                    <form method="post">
                                        <input type="hidden" name="token_comment" value="<?= miniToken('token_comment'); ?>">
                                        <div class="form-group">
                                            <br><label for="Textarea1">Entrez votre commentaire</label><br>
                                            <textarea class="form-control" id="Textarea1" rows="3"></textarea>

                                        </div>


                                        <button type="submit" class="btn btn-primary">Envoyer</button>
                                    </form>
                                <?php
                                } else {
                                    echo '<div class="my-5">Réservé aux membres ! <a href="/login.php">Veulliez vous identifier svp </a></div>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                <?php }

                ?>

            </div>
        </div>
    </div>
</div>

<?php require_once "part/footer.php"; ?>