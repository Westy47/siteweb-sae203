<!-- A faire -->
<?php
require "connect.php";

function obtenirPhotos()
{
    // Connexion à la base de données
    $dbh = connect(); // avant la fonction, il faut avoir fait un require pour pouvoir utiliser la fonction connect

    // Requête SQL pour obtenir les photos, triées par date
    $sql = "SELECT file_path FROM photos ORDER BY upload_date";

    // Préparation et exécution de la requête
    $sth = $dbh->prepare($sql);
    $sth->execute();

    // Récupération des résultats sous forme de tableau associatif
    $results = $sth->fetchAll(PDO::FETCH_ASSOC);

    // Retourner les résultats
    return $results;
}

