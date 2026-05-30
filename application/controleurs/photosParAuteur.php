<?php
require_once "../modeles/connect.php";

function getPhotosParAuteur()
{
    $dbh = connect();
    // Recherche le nombre de photos pour chaque utilisateur
    $sql = "SELECT u.alias, COUNT(p.id) AS nb_photos
            FROM users u
            LEFT JOIN photos p ON p.author_id = u.id
            GROUP BY u.id, u.alias
            ORDER BY nb_photos DESC";
    $sth = $dbh->prepare($sql);
    $sth->execute();
    return $sth->fetchAll(PDO::FETCH_ASSOC);
}

$data = getPhotosParAuteur();
$labels = array_column($data, "alias");
$values = array_column($data, "nb_photos");

require_once "../vues/vuePhotosParAuteur.php";
?>
