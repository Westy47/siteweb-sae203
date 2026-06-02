<?php

function importRating($photoId, $userId, $grade)
{
    $dbh = connect();
    $sql = "INSERT INTO votes (photo_id, user_id, grade)
            VALUES (:photo_id, :user_id, :grade)
            ON DUPLICATE KEY UPDATE grade = VALUES(grade);";

    $sth = $dbh->prepare($sql);
    $sth->execute([
        ":photo_id" => $photoId,
        ":user_id" => $userId,
        ":grade" => $grade,
    ]);
}

function selectUserRating()
{
    $dbh = connect();
    $sql = "SELECT photo_id, grade FROM votes WHERE user_id=:userId";
    $sth = $dbh->prepare($sql);
    $sth->execute([":userId" => $_SESSION["userId"]]);
    $results = $sth->fetchAll(PDO::FETCH_ASSOC);
    $keyed = [];
    foreach ($results as $row) {
        $keyed[$row["photo_id"]] = $row["grade"];
    }
    return $keyed;
}
function selectAllRatings($id)
{
    // Connexion à la base de données
    $dbh = connect(); // avant la fonction, il faut avoir fait un require pour pouvoir utiliser la fonction connect

    // Requête SQL pour obtenir les photos, triées par date
    $sql = "SELECT AVG(grade) AS moyenne FROM votes WHERE photo_id=:photo_id";

    // Préparation et exécution de la requête
    $sth = $dbh->prepare($sql);
    $sth->execute([":photo_id" => $id]);

    // Récupération des résultats sous forme de tableau associatif
    $results = $sth->fetch(PDO::FETCH_ASSOC);

    // Retourner les résultats
    return $results;
}

function top3photos()
{
    // Connexion à la base de données
    $dbh = connect(); // avant la fonction, il faut avoir fait un require pour pouvoir utiliser la fonction connect

    // Requête SQL pour obtenir les photos, triées par date
    $sql = "SELECT p.id, p.title, p.file_path, COUNT(v.user_id) AS nb_votes, AVG(grade) AS moyenne 
            FROM photos p
            JOIN votes v ON p.id=v.photo_id
            GROUP BY p.id
            ORDER BY moyenne DESC
            LIMIT 3";

    // Préparation et exécution de la requête
    $sth = $dbh->prepare($sql);
    $sth->execute();

    // Récupération des résultats sous forme de tableau associatif
    $results = $sth->fetchAll(PDO::FETCH_ASSOC);

    // Retourner les résultats
    return $results;
}
