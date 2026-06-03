<?php
require_once "connect.php";

function obtenirPhotos()
{
    $dbh = connect();
    $sql = "SELECT * FROM photos ORDER BY upload_date";
    $sth = $dbh->prepare($sql);
    $sth->execute();
    return $sth->fetchAll(PDO::FETCH_ASSOC);
}

function getPhotoById($id)
{
    $dbh = connect();
    $sql = "SELECT * FROM photos WHERE id = :id";
    $sth = $dbh->prepare($sql);
    $sth->execute([":id" => $id]);
    return $sth->fetch(PDO::FETCH_ASSOC);
}

// Nombre de photos publiées par chaque auteur (données du graphique de l'accueil)
function getPhotosParAuteur()
{
    $dbh = connect();
    $sql = "SELECT u.alias, COUNT(p.id) AS nb_photos
            FROM users u
            LEFT JOIN photos p ON p.author_id = u.id
            GROUP BY u.id, u.alias
            ORDER BY nb_photos DESC";
    $sth = $dbh->prepare($sql);
    $sth->execute();
    return $sth->fetchAll(PDO::FETCH_ASSOC);
}
