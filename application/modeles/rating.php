<?php
require_once "connect.php";

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

function deleteRating($photoId, $userId)
{
    $dbh = connect();
    $sql =
        "DELETE FROM votes WHERE photo_id = :photo_id AND user_id = :user_id";

    $sth = $dbh->prepare($sql);
    $sth->execute([
        ":photo_id" => $photoId,
        ":user_id" => $userId,
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
    $dbh = connect();
    $sql = "SELECT moyenne FROM photos WHERE id=:photo_id";
    $sth = $dbh->prepare($sql);
    $sth->execute([":photo_id" => $id]);
    return $sth->fetch(PDO::FETCH_ASSOC);
}

function top3photos()
{
    $dbh = connect();
    $sql = "SELECT p.id, p.title, p.file_path, COUNT(v.user_id) AS nb_votes, AVG(grade) AS moyenne
            FROM photos p
            JOIN votes v ON p.id=v.photo_id
            GROUP BY p.id
            ORDER BY moyenne DESC
            LIMIT 3";
    $sth = $dbh->prepare($sql);
    $sth->execute();
    return $sth->fetchAll(PDO::FETCH_ASSOC);
}
