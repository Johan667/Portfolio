<?php

require_once 'config/framework.php';
require_once 'config/connect.php';

if (!isset($_SESSION['user'])) {
    redirectToRoute();
}


dump($_SESSION['user']);
echo 'bonjour '.$_SESSION['user']['pseudo'];


