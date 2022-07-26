<?php

require "inc/init.inc.php";


if (empty($_GET["id"]) or !is_numeric($_GET["id"])) { // recupere l'id pour la requete / si pas d'id dans $_GET renvoie sur la page d'accueil avec une erreur
    $_SESSION["erreur"] = "Cette page n'existe pas";
    redirection("/");
}
$id = $_GET["id"];


$annonce = selectionId("advert", $id);

if ($_POST) {
    $requete = connexion()->exec("UPDATE advert SET reservation_message = '" . $_POST["reservation_message"] . "' WHERE id = $id");
    if ($requete) {
        $_SESSION["succes"] = "Vous avez bien réserver l'annonce";
        redirection("/");
    } else {
        $_SESSION["erreur"] = "La réservation n'a pas pu se faire";
        redirection("/");
    }
}

affichage("fiche.html.php", [
    "h1" => "Détails de l'annonce " . $annonce["title"],
    "annonce" => $annonce,
]);
