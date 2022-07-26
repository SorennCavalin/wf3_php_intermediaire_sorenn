<?php

require "inc/init.inc.php";

if ($_POST) { //apres l'envoi du formulaire
    $erreurs = [];
    extract($_POST); //créé les variables $price $description $title $postal_code et $city 
    // d_exit($_POST);
    if (!is_numeric($price)) {
        $erreurs[] = "le prix doit etre un nombre ";
    }
    if (!in_array($type, ["vente", "location"])) {
        $erreurs[] = "Ce site n'accepte que les ventes ou locations";
    }

    if (is_numeric($postal_code)) {
        if (strlen($postal_code) !== 5) {
            $erreurs[] = "Le code postal doit faire 5 chiffre";
        }
    } else {
        $erreurs[] = "le code postal doit etre un nombre";
    }
    //Maintenant on filtre et verifie les string qui peuvent être nocif avec trim() et htmlentities()
    $city = trim($city);
    $city = htmlentities($city);
    if (strlen($city) > 50) {
        $erreurs[] = "Le nom de la ville est trop long, je vous prie de le raccourcir ou d'enlever les caractères spéciaux";
    }
    $title = trim($title);
    $title = htmlentities($title);
    if (strlen($title) > 40) {
        $erreurs[] = "Le titre est trop long, je vous prie de le raccourcir ou d'enlever les caractères spéciaux";
    }
    if (!empty($description)) {
        $description = trim($description);
        $description = htmlentities($description);
    } else {
        $erreurs[] = "une description est necessaire pour la mise en ligne d'une annonce";
    }

    if (!$erreurs) {
        $prep = "INSERT INTO advert (type,price,title,description,city,postal_code)
                 VALUES (:type,:prix,:titre,:descr,:ville,:code_p)";
        $requete = connexion()->prepare($prep);
        $requete->bindValue(":type", $type);
        $requete->bindValue(":prix", $price);
        $requete->bindValue(":titre", $title);
        $requete->bindValue(":descr", $description);
        $requete->bindValue(":ville", $city);
        $requete->bindValue(":code_p", $postal_code);
        $resultat = $requete->execute();
        if ($resultat) {
            $_SESSION["succes"] = "La nouvelle annonce $title à été enregistrer";
            redirection("/");
        } else {
            $_SESSION["erreur"] = "erreur de la mise en ligne";
            redirection("/");
        }
    }
}



affichage("form.html.php", [
    "h1" => "Ajouter une annonce",
    "erreurs" => $erreurs ?? ""
]);
