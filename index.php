<?php

require_once 'config/framework.php';
require_once 'config/connect.php';
require_once 'part/header.php';



?>


<div id="hero" class="hero">
    <div class="container">
        <div class="row">

            <div class="col-md-6">
                <h1>Johan Kasri</h1>
                <div class="page-scroll">
                    <p class="job-title">Developpeur Web Junior</p>
                    <a href="#contact" class="btn btn-fill ">Me contacter</a>
                    <div class="clearfix visible-xxs"></div>
                    <a href="#portfolio" class="btn btn-border">Réalisations</a>
                </div>
            </div>

            <div class="col-md-6 text-right">
                .

            </div>

        </div>

    </div>
</div>
</div><!-- /.hero -->

<main id="main" class="site-main">

    <section id="about" class="site-section section-about text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <h2>Portrait</h2>
                    <img src="assets/img/lines.svg" class="img-lines" alt="lines">
                    <p> Developpeur Web Junior, Je debute ma carrière , un seul mot d'ordre, perseverance. Actuellement
                        en remise à niveau dans les métiers du numerique. Je serais bientot apte à être votre solution.
                        Vous avez un projet et vous voulez vous lancer, besoin d'aide ? Je suis votre meilleur atout.
                    </p>
                    <?php if (isset($_SESSION['user'])) { ?>
                        <a href="CDC.docx" class="btn btn-fill">Votre devis en Ligne !</a>
                    <?php
                    } else {
                        echo '<div class="my-5">Réservé aux membres ! <a href="/login.php">Veulliez vous identifier svp </a></div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </section><!-- /.secton-about -->

    <section class="site-section section-skills">
        <div class="container">
            <div class="text-center">
                <h3>COMPETENCES</h3>
                <img src="assets/img/lines.svg" class="img-lines" alt="lines">
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="skill">

                        <h4><img src="assets/img/competence.png"> Html <img src="assets/img/competence.png"></h4>

                    </div><!-- /.skill -->
                    <div class="skill">
                        <h4><img src="assets/img/competence.png"> Css <img src="assets/img/competence.png"></h4>

                    </div><!-- /.skill -->
                </div>
                <div class="col-md-4">
                    <div class="skill">
                        <h4><img src="assets/img/competence.png"> Php <img src="assets/img/competence.png"></h4>

                    </div><!-- /.skill -->
                    <div class="skill">
                        <h4><img src="assets/img/competence.png"> Python <img src="assets/img/competence.png"></h4>

                    </div><!-- /.skill -->
                </div>
                <div class="col-md-4">
                    <div class="skill">
                        <h4><img src="assets/img/competence.png"> Excel <img src="assets/img/competence.png"></h4>

                    </div><!-- /.skill -->
                    <div class="skill">
                        <h4><img src="assets/img/competence.png"> Javascript <img src="assets/img/competence.png"></h4>

                    </div><!-- /.skill -->
                </div>
            </div>
        </div>
    </section><!-- /.secton-skills -->

    <section id="service" class="site-section section-services overlay text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3>Mes Objectifs</h3>
                    <img src="assets/img/lines.svg" class="img-lines" alt="lines">
                </div>
                <div class="col-sm-4">
                    <div class="service">
                        <img src="assets/img/front-end.svg" alt="Front End Developer">
                        <h4>Création Projet Vitrine</h4>
                        <p>Je souhaite dévelloper un site vitrine</p>
                    </div><!-- /.service -->
                </div>
                <div class="col-sm-4">
                    <div class="service">
                        <img src="assets/img/back-end.svg" alt="Back End Developer">
                        <h4>Projet Back-office</h4>
                        <p>Manier avec précision le language PHP et les mettre en lien avec des base de données
                            MYSQL; Créer des interfaces ADMINISTRATEUR</p>
                    </div><!-- /.service -->
                </div>
                <div class="col-sm-4">
                    <div class="service">
                        <img src="assets/img/consultancy.svg" alt="Coding">
                        <h4>Consultant</h4>
                        <p>Definir un cahier des charges, et proposer des solutions adaptées à votre projet.</p>
                    </div><!-- /.service -->
                </div>
            </div>
        </div>
    </section><!-- /.secton-services -->

    <section id="portfolio" class="site-section section-portfolio">
        <div class="container">
            <div class="text-center">
                <h3>Mes Dernieres réalisations</h3>
                <img src="assets/img/lines.svg" class="img-lines" alt="lines">
            </div>

            <?php $sql = "SELECT P.id, P.titre, P.slug, P.content, P.image, P.creation, U.pseudo
                              FROM projets AS P 
                              INNER JOIN users AS U 
                                ON P.auteur = U.id
                              WHERE P.statut = 1 
                              ORDER BY creation DESC 
                              LIMIT 5";

            $projets = query($sql);

            ?>

            <div class="row">
                <?php $i = 1;
                foreach ($projets as $projet) { ?>
                    <div class="col-md-4 col-xs-6">
                        <div class="portfolio-item">
                            <img src="<?= $projet['image']; ?>" class="img-res" alt="<?= $projet['titre']; ?>">
                            <div class="portfolio-item-info">
                                <h4><?= $projet['titre']; ?>
                                    <a href="/projet.php?slug=<?= $projet['slug']; ?>"><span class="glyphicon glyphicon-eye-open"></span></a>
                                    <a href="https://github.com/Johan667"><span class="glyphicon glyphicon-link"><img src=../assets/img/logo-github.png></span></a>
                            </div>
                        </div>
                    </div>
                <?php $i++;
                } ?>


                <div class="col-md-4 col-xs-6">
                    <div class="portfolio-item">
                        <img src="assets/img/portfolio-5.jpg" class="img-res" alt="">
                        <div class="portfolio-item-info">
                            <h4>Project personnelle en cours</h4>
                            <a href="/projet.php?slug=<?= $projet['slug']; ?>" data-target="#portfolioItem<?= $i; ?>"><span class="glyphicon glyphicon-eye-open"></span></a>
                            <a href="https://github.com/Johan667"><span class="glyphicon glyphicon-link"><img src=../assets/img/logo-github.png></span></a>
                        </div>


                    </div>

                </div>

            </div>
        </div>
        </div>
    </section>

    <section class="site-section section-counters text-center">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-xs-12">
                    <p class="counter start" data-to="10" data-speed="2000">3</p>
                    <h4>Mois D'experience</h4>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <p class="counter start" data-to="1" data-speed="2000">3</p>
                    <h4>Projet réalisées</h4>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <p id="infinity" class="counter" data-from="0" data-to="1" data-speed="1000">204</p>
                    <h4>Cafés</h4>
                </div>
            </div>
        </div>
    </section><!-- /.section-counters -->

    <section id="contact" class="site-section section-form text-center">
        <div class="container">

            <h3>Contactez moi</h3>
            <img src="assets/img/lines.svg" class="img-lines" alt="lines">
            <form method="post">
                <div class="row">
                    <div class="col-sm-12">
                        <input type="text" name="nom" placeholder="Prénom/Nom" maxlength="50" size="30" value="<?php if (
                                                                                                                    isset($_POST['nom'])
                                                                                                                ) echo htmlspecialchars($_POST['nom']); ?>">


                        <input type="text" name="email" placeholder="E-mail" maxlength="80" size="30" value="<?php if (isset($_POST['email'])) echo htmlspecialchars($_POST['email']); ?>">
                    </div>

                    <div class="col-sm-12">
                        <textarea name="commentaire" placeholder="  Contenu de votre demande" cols="40" rows="5">
                            <?php if (isset($_POST['commentaire'])) echo htmlspecialchars($_POST['commentaire']); ?></textarea>

                    </div>
                </div>

                <button href="#" class="btn btn-border" type="submit">Envoyer <span class="glyphicon glyphicon-send"></span></button>
            </form>
        </div>
    </section><!-- /.section-form -->

</main><!-- /#main -->


<?php $i = 1;
foreach ($projets as $projet) { ?>
    <div id="portfolioItem<?= $i; ?>" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <a class="close" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></a>
                    <img class="img-res" src="<?= $projet['image']; ?>" alt="<?= $projet['titre']; ?>">
                </div>
                <div class="modal-body">
                    <h4 class="modal-title"><?= $projet['titre']; ?></h4>
                    <p><?= $projet['content']; ?></p>
                </div>
                <div class="modal-footer">
                    <a href="https://github.com/Johan667" class="btn btn-fill"><span class="fa fa-github mr-2"></span>Github</a>
                    <a class="btn btn-dark" data-toggle="collapse" href="#multiCollapse-<?= $i; ?>-1" role="button" aria-expanded="false" aria-controls="multiCollapse-<?= $i; ?>-1">Commentaires</a>
                    <a class="btn btn-dark" data-toggle="collapse" href="#multiCollapse-<?= $i; ?>-2" role="button" aria-expanded="false" aria-controls="multiCollapse-<?= $i; ?>-2">Votre avis</a>



                </div>
            </div>
        </div>

    </div>
    </div>
    </div>
    </div>
<?php $i++;
} ?>
<?php require_once 'part/footer.php'; ?>