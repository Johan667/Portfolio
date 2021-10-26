<?php 

require_once '../vendor/autoload.php';
require_once '../config/framework.php';
require_once '../config/connect.php';


$mysqli;

$sql= "SELECT COUNT(*) as nbProjets FROM projets";
$data= query($sql);
$nbProjets= $data[0]['nbProjets'];
$parPage = 10;
$nbPage = ceil($nbProjets/$parPage);
$cPage= 1;

    $sql = "SELECT P.id, P.titre, P.slug, P.content, P.image, P.creation, U.id AS id_user, U.email, U.pseudo
            FROM projets AS P 
            INNER JOIN users AS U 
              ON P.auteur = U.id
            WHERE P.statut = 1 
            ORDER BY creation DESC 
            LIMIT ".(($cPage-1)*$parPage)." , $parPage";
    $projets = query($sql);
    dump($projets);
         
echo "$cPage sur $nbPage" ; 
?>






