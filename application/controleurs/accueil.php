<?php
session_start();

require "../modeles/photos.php";
require "../modeles/rating.php";

// Photos récemment ajoutées
$listePhotos = obtenirPhotos();

// Notes précédentes de l'utilisateur connecté
if (isset($_SESSION["pseudo"])) {
    $userRatings = selectUserRating();
}

// Données du graphique « photos par auteur »
$data = getPhotosParAuteur();
$labels = array_column($data, "alias");
$values = array_column($data, "nb_photos");

require "../vues/vueAccueil.php";
