<?php $i = 1 ?>


<table class="table table-bordered">
    <thead class="table-info">
        <th>Titre</th>
        <th>Ville/Code postal</th>
        <th>Type d'annonce</th>
        <th>Description</th>
        <th>Prix</th>
        <th>disponibilitée</th>
        <th>Actions</th>
    </thead>
    <tbody>
        <?php foreach ($annonces as $annonce) : ?>
            <?php if ($annonce["reservation_message"] !== null) : ?>
                <?php if ($annonce["id"] % 2 === 1) : ?>
                    <tr class="table-active">
                    <?php else : ?>
                    <tr class="table-active table-light">
                    <?php endif ?>
                <?php else : ?>
                    <?php if ($annonce["id"] % 2 === 1) : ?>
                    <tr>
                    <?php else : ?>
                    <tr class="table-light">
                    <?php endif ?>
                <?php endif ?>


                <td><?= $annonce["title"] ?></td>
                <td><?= $annonce["city"] . " / " . $annonce["postal_code"] ?></td>
                <td><?= $annonce["type"] ?></td>
                <td><?= $annonce["description"] ?></td>
                <td><?= $annonce["price"] . "€" ?></td>
                <td><?= $annonce["reservation_message"] ? "Réservé"  : "Disponible"  ?></td>
                <td>
                    <a href="annonce_fiche.php?id=<?= $annonce["id"] ?>"><i class="fa fa-eye m-1"></i></a>
                </td>
                    </tr>
                <?php endforeach ?>
    </tbody>
</table>
<div class="d-flex justify-content-around">
    <?php extract($pages) ?>
    <a href="?page=1" class="btn <?= ($page < 2) ? "disabled" : "" ?>">
        <i class="fas fa-angle-double-left"></i>
    </a>
    <a href="?page=<?= $page - 1 ?>" class="btn <?= ($page < 2) ? "disabled" : "" ?>">
        <i class="fas fa-angle-left"></i>
    </a>
    <a href="?page=<?= $page + 1 ?>" class="btn <?= ($page >= $pageMax) ? "disabled" : "" ?>">
        <i class="fas fa-angle-right"></i>
    </a>
    <a href="?page=<?= $pageMax ?>" class="btn <?= ($page >= $pageMax) ? "disabled" : "" ?>">
        <i class="	fas fa-angle-double-right"></i>
    </a>
</div>