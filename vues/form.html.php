<?php



?>

<?php if (!empty($erreurs)) : ?>
    <div class="erreur-formulaire">
        <?php foreach ($erreurs as $err) : ?>
            <div class="text-danger"><?= $err ?></div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<form method="post">
    <div class="form-group">
        <label for="title">Titre pour l'annonce <sup class="text-red">*</sup></label>
        <input type="text" name="title" id="title" class="form-control">
    </div>
    <div class="form-group">
        <label for="type"> Annonce pour une : <sup class="text-red">*</sup></label>
        <select name="type" id="type" class="custom-select" aria-label="Default select example">
            <option value="" selected hidden></option>
            <option value="location">location</option>
            <option value="vente">vente</option>
        </select>
    </div>
    <div class="row form-group">
        <div class="col">
            <label for="city">Ville<sup class="text-red">*</sup></label>
            <input type="text" name="city" id="city" class="form-control">
        </div>
        <div class="col">
            <label for="postal_code">Code postal<sup class="text-red">*</sup></label>
            <input type="text" name="postal_code" id="postal_code" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label for="description">Description pour l'annonce <span class="text-muted">(facultatif)</span></label>
        <textarea type="text" name="description" id="description" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <label for="price">Prix <sup class="text-red">*</sup></label>
        <input type="text" name="price" id="price" class="form-control">
    </div>

    <div class="d-flex justify-content-between">
        <button type="submit" class="btn btn-primary">
            Poster l'annonce
        </button>
        <a href="produits_liste.php" class="btn btn-danger">Annuler</a>
    </div>
</form>