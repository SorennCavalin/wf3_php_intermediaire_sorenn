<?php

require "inc/init.inc.php";


if (empty($_GET["page"]) or !is_numeric($_GET["page"])) { // renvoie a la page 1 si $_GET ne contient pas "page" ou si il ne contient pas de chiffre
    redirection("annonce_liste.php?page=1");
}

// Pour connaitre et utiliser le nombre maximum de page possible ->

$page = $_GET["page"]; //recupere le numero de la page
$nbParPage = 10; // changer cette valeur pour modifier directement e nombre d'annonce voulu par page
$nbAnnonces = connexion()->query("SELECT Count(id) as compte FROM advert")->fetch(PDO::FETCH_ASSOC); //recupere le nombre d'annonce en base de donnée
$nombreRequete = ($page - 1) * $nbParPage; // permet a la requete de reprendre a la suite de la derniere annonce sur la page precedente
$pageMax = ceil($nbAnnonces["compte"] / $nbParPage); // nombre maximum de page

$requete = connexion()->query("SELECT *
                                FROM advert
                                LIMIT $nombreRequete,$nbParPage"); //selectionne le nombre d'annonce selon la valeur de $nombre requete
if ($requete->rowCount() <= 0) { //si l'id de $_GET est trop grand pour ceux en base de donnée, retourne a la derniere page possible
    redirection("annonce_liste.php?page=$pageMax");
}

$pages = ["pageMax" => $pageMax, "page" => $page];
affichage("liste.html.php", [
    "h1" => "Toutes les annonces",
    "pages" => $pages,
    "annonces" => $requete
]);
