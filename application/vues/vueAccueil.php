<?php require('header.php'); ?>
<!-- A compléter ici -->

<?php
foreach($listePhotos as $src): ?>
<img src="../../<?=$src['file_path'] ?>" alt="">
<?php endforeach; ?>

<?php require('footer.php') ?>