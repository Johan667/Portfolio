<?php

use Faker\Factory;

require_once '../vendor/autoload.php';
require_once '../config/framework.php';
require_once '../config/connect.php';
require_once '../config/formtext.php';

$faker = Factory::create('fr_FR'); 

for ($i=0; $i < 200; $i++) {


  // generer une image //
  $image = "https://lorempixel.com/640/480/"; 


  // generer un titre entre 10 et 20 caractere //
  $titre=$faker->sentence(rand(2, 4));

  // generer un username/ID //
  $id=$faker->userName;

  // generer du contenu //
  $content=addslashes(htmlentities(htmlspecialchars($faker->realText(255, 4))));


  // generer un statut //
  $status = [true, false];
  shuffle($status);
  $statut = $status[0];

  // date creation du projet //
  $creation = $faker->dateTimeBetween('-6 month', 'now');
  $creation = date_format($creation, 'Y-m-d H:i:s');

  //slug//
  $slug = slug($titre);


  $titre = addslashes(htmlentities(htmlspecialchars($titre)));

  // generer un username/ID //
  if ($result = $mysqli->query("SELECT id FROM users ORDER BY RAND() LIMIT 1")) {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $auteur = $row['id'];
        }
    }
    $result->close();
  }
  ?>


  <?php


      $sql= "INSERT INTO projets(titre,slug,content,image,statut,creation,auteur) VALUES ('".addslashes(htmlentities(htmlspecialchars($titre)))."','".$slug."','".$content."','".$image."','".$statut."','".$creation."','".$auteur."')";
      if ($mysqli->query($sql)) {
        echo $id. "<br>";
        echo addslashes(htmlentities(htmlspecialchars($titre))). "<br>";
        echo $slug. "<br>";
        echo $content. "<br>";
        echo $statut. "<br>";
        echo $creation. "<br>";
        echo $auteur. "<br>";
        echo $image. "<br>";
      } else {
        printf("Message d'erreur : %s\n", $mysqli->error);
      }
}

