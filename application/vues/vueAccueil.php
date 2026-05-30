<?php require "header.php"; ?>
<!-- A compléter ici -->

<link rel="stylesheet" href="../../public/css/global.css">
<link rel="stylesheet" href="../../public/css/accueil.css">
<link rel="stylesheet" href="../../public/css/rating.css">

<div class="page">

<?php foreach ($listePhotos as $key => $src):

    $i = $src["id"];
    $r = $userRatings[$key]["grade"];

    // on récupère la moyenne de chaque image
    $m = selectAllRatings($src["id"]);
    $m = $m["moyenne"];

    // On récupère juste la valeur

    // var_dump($m);
    ?>
      <div class="carte">
      <div class="cadre">
        <img src="../../<?= $src["file_path"] ?>" alt="">
      </div>
        <div class="legend">
            
                <?php if (
                    isset($_SESSION["pseudo"]) and
                    $_SESSION["userId"] !== $src["author_id"]
                ) { ?>
                  <form action="../controleurs/note.php" method="get" class="rating-form">
                <input type="hidden" name="photo_id" value="<?= $i ?>">
                  <div class="stars" aria-label="Notation">
                    <input type="radio" id="star5-<?= $i ?>" name="rating" value="5">
                    <label for="star5-<?= $i ?>" title="5 étoiles">★</label>

                    <input type="radio" id="star4-<?= $i ?>" name="rating" value="4">
                    <label for="star4-<?= $i ?>" title="4 étoiles">★</label>

                    <input type="radio" id="star3-<?= $i ?>" name="rating" value="3">
                    <label for="star3-<?= $i ?>" title="3 étoiles">★</label>

                    <input type="radio" id="star2-<?= $i ?>" name="rating" value="2">
                    <label for="star2-<?= $i ?>" title="2 étoiles">★</label>

                    <input type="radio" id="star1-<?= $i ?>" name="rating" value="1">
                    <label for="star1-<?= $i ?>" title="1 étoile">★</label>
                </div>
                <button type="submit" class="rating-submit">Valider</button>
            </form>
            <?php if ($r): ?>
            <p>Votre note précedente était: <?= $r ?>🌟 </p>
            <p>La note moyenne de cette image est: <?= $m ?>🌟</p>
            <?php endif; ?> 

                <?php } ?>
        </div>
      </div>
<?php
endforeach; ?>
</div>
<div id="parent">
      <button class="close-btn"></button>
      <img src="https://placehold.co/600x400" alt="placeholder" id="bigPic">
</div>
<?php require "../controleurs/photosParAuteur.php" ?>
<?php require "footer.php"; ?>

<script src="../../public/js/bigPic.js"></script>