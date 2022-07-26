<!-- <div class="card-columns">
    < ?php foreach ($annonces as $annonce) : ?>
        <div class="card">
            <img src="" alt="" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title text-uppercase">< ?= $annonce["title"] ?></h5>
                <p class="card-text">< ?= $annonce["postal_code"] . " - à " . $annonce["city"] ?></p>
                <p class="card-text">< ?= $annonce["price"] ?> €</p>
                <p class="card-text">
                    <a href="annonce_fiche.php?id=< ?= $annonce["id"] ?>"> Voir plus </a>
                </p>
            </div>
        </div>
    < ?php endforeach ?>
</div> -->
<?php foreach ($annonces as $annonce) : ?>
    <div class="card mb-3 border-primary">
        <div class="card-body">
            <h5 class="card-title text-uppercase"><?= $annonce["title"] ?></h5>
            <p class="card-text"><?= "Dans le " . $annonce["postal_code"] . " à " . $annonce["city"] ?></p>
            <p class="card-text"><?= substr($annonce["description"], 0, 15) . "..." ?></p>
            <p class="card-text"><?= $annonce["price"] ?> €</p>
            <small class="card-text text-muted"><a class="btn btn-primary" href="annonce_fiche.php?id=<?= $annonce["id"] ?>"> Voir plus </a></small></p>
        </div>
    </div>
<?php endforeach ?>