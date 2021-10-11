<?php

use Faker\Factory;

require_once '../vendor/autoload.php';
require_once '../config/framework.php';
require_once '../config/connect.php';

$faker = Factory::create(); 

for ($i = 0; $i < 10; $i++){
    echo $faker->name. "<br>";
    echo $faker->freeEmailDomain. "<br>";
    
}