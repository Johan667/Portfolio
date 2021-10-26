<?php

require_once '../config/framework.php';
require_once '../config/connect.php';
require_once "header.php";


if (!isset($_SESSION['user'])) {
    redirectToRoute();
}

if (isset($_SESSION['user'])) {
    $roles = json_decode($_SESSION['user']['roles']);
    if (!in_array('ROLE_ADMIN', $roles)) {
        redirectToRoute();
    }
}




/* if (isset($_POST['projet'])) {
    $sql = "UPDATE projets SET titre,content,image,auteur ='" . $projets . "' WHERE projets='" . $projets['titre'] . $projets['content'] . $projets['image'] . $projets['auteur'] .   "'";
    if ($mysqli->query($sql)) {
        echo " Votre projet à bien été modifié";
    } else {
        echo " Modification à echouer";
    }
} */
?>

<h1> Tous les projets </h1>
<br>
<br>
<br>

<!-- -------------------------------------------------  TABLE  ---------------------------------------->
<div class="container">
    <div class="row">
        <div class="col-12">


            <table>
                <br>
                <button type="button" class="btn btn-success mb-2">
                    <bold>+</bold> Ajouter un projet
                </button><br>

                <thead>
                    <tr>
                        <th></th>
                        <th></th>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Image</th>
                        <th>Activé</th>
                        <th>Fictif</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach (query('SELECT * FROM projets LIMIT 10') as $projet) : ?>
                        <tr>
                            <td>
                                <a href="/admin/formprojet.php?edition=edit&id=<?= $projet['id']; ?>"><span class="fa fa-edit"></span></a>
                            </td>
                            <td>

                                <a href="/admin/formprojet.php?edition=delete&id=<?= $projet['id']; ?>"> <span class="fa fa-trash-o"></span></a>

                            </td>
                            <td>
                                <?= $projet['id'] ?>
                            </td>
                            <td>
                                <?= $projet['titre'] ?>
                            </td>
                            <td>
                                <img src="<?= $projet['image'] ?>" width="32" height="32">
                            </td>
                            <td>
                                <span class="fa fa-check"></span>
                            </td>
                            <td>
                                <span class="fa fa-times"></span>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>

                </tbody>
            </table>


        </div>
    </div>
</div>

<!-- -------------------------------------------------  TABLE  ---------------------------------------->
<br>
</body>
<br>

<?php require_once "footer.php" ?>