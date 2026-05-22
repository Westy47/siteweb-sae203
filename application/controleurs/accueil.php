

<?php
session_start();
require "../modeles/photos.php";
require "../modeles/rating.php";

// on récupère auprès du modèle les photos récemment ajoutées
$listePhotos = obtenirPhotos();
// on récupère les précedentes notes de cet user
$userRatings = selectUserRating();

require "../vues/vueAccueil.php";


?>
