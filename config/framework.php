<?php

// Démarrage session
session_start();

// Ajoute le fichier defines.php
require_once 'defines.php';

/*
 * Met a jour l'horloge avec le timezone par default
 * avec la constante TIMEZONE_DEFAULT défini dans le fichier defines.php
 */
date_default_timezone_set(TIMEZONE_DEFAULT);

/**
 * Redirige sur une autre page.
 */
function redirectToRoute(string $target = '/')
{
    header('Location: '.$target);
    exit();
}

/**
 * Undocumented function.
 */
function miniToken(string $token = 'token')
{
    $alpha = str_shuffle(
                implode(range('a', 'z'))
               .implode(range('A', 'Z'))
               .implode(range(0, 9))
            );

    $_SESSION[$token] = $alpha;

    return $alpha;
}

/**
 * Function var_dump().
 *
 * Affiche les var_dump seulement si l'application
 * est en environnement développement.
 *
 * APP_ENV est definie dans le fichier defines.php
 * APP_ENV = dev (environnement développement)
 * APP_ENV = prod (environnement production)
 *
 * @param void $variable (varibale a tester, peu être de type bool,array,string,int,float...)
 * @param bool $type     (false pour le print_r, true pour le var_dump)
 */
function dump($variable, bool $type = false)
{
    if (APP_ENV === 'dev') {
        if ($type === false) {
            echo '<pre class="my-4">'.print_r($variable, true).'</pre>';
        } else {
            var_dump($variable);
        }
    }
}
