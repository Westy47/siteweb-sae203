<?php require "header.php"; ?>
<!-- A compléter ici -->

<link rel="stylesheet" href="../../public/css/global.css">

<div class="page">
<?php foreach ($listePhotos as $src): ?>
<img src="../../<?= $src["file_path"] ?>" alt="">
<?php endforeach; ?>
</div>

<div id="parent">
      <button class="close-btn"></button>
      <img src="https://placehold.co/600x400" alt="placeholder" id="bigPic">
</div>

<?php require "footer.php"; ?>

<script src="../../public/js/bigPic.js"></script>