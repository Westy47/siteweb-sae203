<?php
session_start();
require('../modeles/photos.php');

// on récupère auprès du modèle les photos récemment ajoutées
$listePhotos = obtenirPhotos();


require('../vues/vueAccueil.php');
