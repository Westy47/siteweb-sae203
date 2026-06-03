<?php
session_start();

require "../modeles/photos.php";
require "../modeles/rating.php";

// Contrôle d'accès : il faut être connecté pour voter
if (!isset($_SESSION["userId"])) {
    header("Location: connexion.php");
    exit();
}

// Les paramètres attendus doivent être présents
if (!isset($_GET["photo_id"], $_GET["rating"])) {
    header("Location: ../../");
    exit();
}

$userId = (int) $_SESSION["userId"];
$photoId = (int) $_GET["photo_id"];
$rating = (int) $_GET["rating"];

// La note doit être comprise entre 1 et 5
if ($rating < 1 || $rating > 5) {
    header("Location: ../../");
    exit();
}

// On refuse qu'un utilisateur note une photo inexistante ou sa propre photo
$photo = getPhotoById($photoId);
if ($photo === false || (int) $photo["author_id"] === $userId) {
    header("Location: ../../");
    exit();
}

importRating($photoId, $userId, $rating);

header("Location: ../../");
exit();
