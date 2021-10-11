<?php

use Faker\Factory;

require_once '../vendor/autoload.php';
require_once '../config/framework.php';
require_once '../config/connect.php';

$faker = Factory::create(); 
$faker = Faker\Factory::create('fr_FR');
for ($i = 0; $i < 10; $i++){
   // echo $faker->name. "<br><br>";
   // echo $faker->freeEmailDomain. "<br><br>";//
   // echo $faker->name.'@'.$faker->freeEmailDomain. "<br><br>"; //
    echo $faker->name.':<br> '.$faker->email. "<br><br>";
    
}

?>