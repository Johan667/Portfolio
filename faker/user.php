<?php

use Faker\Factory;

require_once '../vendor/autoload.php';
require_once '../config/framework.php';
require_once '../config/connect.php';

$faker = Factory::create(); 


for ($i = 0; $i < 10; $i++){
    $pseudo = str_replace([' '],[''],strtolower($faker->name));
    echo $pseudo. "<br>";
    echo $pseudo."@".$faker->freeEmailDomain."<br>";
    $password_hash = password_hash($pseudo, PASSWORD_DEFAULT);
    dump($password_hash);



}