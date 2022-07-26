<?php

require "inc/init.inc.php";
$annonces = connexion()->query("SELECT * FROM advert ORDER BY id DESC LIMIT 0,15");

affichage("accueil.html.php", [
    "h1" => "Le Bon Appart <h2> LE site pour trouver le logement des vos rêves </h2>",
    "annonces" => $annonces,
]);
