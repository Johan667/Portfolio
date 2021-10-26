<?php

use Faker\Factory;

require_once '../vendor/autoload.php';
require_once '../config/framework.php';
require_once '../config/connect.php';
require_once '../config/formtext.php';

$faker = Factory::create('fr_FR'); 

for ($i=0; $i < 3000; $i++) {

    //generer un commentaire
    $commentaire = addslashes(htmlentities($faker->realText(100, 2)));

    // generer un id user
    $result = $mysqli->query("SELECT id FROM users ORDER BY RAND() LIMIT 1");
    $auteur = $result->fetch_assoc();
    $result->close();


    // generer un id projet
    $result = $mysqli->query("SELECT id FROM projets ORDER BY RAND() LIMIT 1");
    $projet = $result->fetch_assoc();
    $result->close();

    $sql = "INSERT INTO commentaires(user,projet,comment) VALUES ('".$auteur['id']."','".$projet['id']."','".$commentaire."')";
      if ($mysqli->query($sql)) {
        echo $auteur['id']. "<br>";
        echo $projet['id']. "<br>";
        echo $commentaire. "<br>";
      } else {
        printf("Message d'erreur : %s\n", $mysqli->error);
      }

}