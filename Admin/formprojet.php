<?php
require_once '../config/framework.php';
require_once '../config/connect.php';
require_once "header.php";

$errors = [];


if (isset($_GET['edition'])) {
    switch ($_GET['edition']) {
        case 'new':
            $sql = "INSERT INTO projets FROM projets WHERE id='" . $_GET['id'] . "'";
            break;
        case 'edit':
            $sql = "UPDATE FROM projets WHERE id='" . $_GET['id'] . "'";
            break;
        case 'delete':
            $sql = "DELETE FROM projets WHERE id='" . $_GET['id'] . "'";
            break;
    }

    if ($mysqli->query($sql) === true) {
        redirectToRoute('/admin/projets.php');
    } else {
        $errors['sql'] = $mysqli->error;
    }
} else {
    $errors['sql'] = 'tutu';
}

?>


<div class="container">
    <div class="row">
        <div class="md-6">
            <h1>MODIFICATION DE PROJET</h1>

            <?= !empty($errors) ? $errors['sql'] : ''; ?>
            <div class="formprojet">
                <form method="post">
                    <div class="form-group">
                        <label for="titre">Titre du Projet</label>
                        <input type="text" class="form-control" id="titre" placeholder="" value="<?= $projets['titre'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="auteur">En ligne</label>
                        <input type="checkbox" name="statut" id="statut" />
                        <label for="auteur">Fictif</label>
                        <input type="checkbox" name="statut" id="statut" />
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" id="description" placeholder=" " value="<?= $projet['content'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Modifier l'image</label>
                        <input type="file" id="file">

                    </div>


                    <button type="submit" class="btn btn-secondary" name="projet">Envoyer le Projet</button><br>
                </form><br>
            </div>
            <div>

            </div>
        </div>

        <?php require_once "footer.php" ?>