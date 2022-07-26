<?php
extract($annonce);
?>

<div class="card mb-3 border-primary">
  <div class="card-body text-center">
    <h5 class="card-title text-uppercase mb-4"><?= $title ?></h5>
    <p class="card-text"><?= "Dans le " . $postal_code . " à " . $city ?></p>
    <p class="card-text"><?= $description ?></p>
    <p class="card-text"><?= $price ?></p>

    <?php if ($reservation_message === null) : ?>
      <div class="d-flex flex-column">
        <strong class="col align-self-center card-text text-center">Une réservation est disponible. <br> Entrez vos coordonnée dans le formulaire suivant et le propriétaire vous recontactera </strong>
        <form method="POST">
          <div class="form-group text-center">
            <textarea type="text" name="reservation_message" id="reservation_message" class="form-control"></textarea>
          </div>
          <button type="submit" class="btn btn-primary"> <i class="fa fa-edit"></i> Réserver</button>
        </form>
      <?php else : ?>
        <strong class="card-text text-center">Cette annonce est déja reservée</strong>
      <?php endif ?>
      </div>
  </div>

  <div class="d-flex justify-content-between">
    <a href="index.php" class="btn btn-primary m-2"> <i class="fa fa-home"></i> retourner à l'accueil</a>
    <a href="annonce_liste.php" class="btn btn-primary m-2"><i class="fa fa-list"></i> retourner à la liste des annonces</a>

  </div>
</div>