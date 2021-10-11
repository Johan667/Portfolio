<?php
    /*************************
    *  Page: deConnexion.php
    *  Page encodée en UTF-8
    **************************/
session_start()

unset($_SESSION['pseudo'],$_SESSION['id']);
header("Refresh: 5; url=./");
echo "Vous avez été correctement déconnecté du site.<br><br><i>Redirection en cours, vers la page d'accueil.</i>";

?>