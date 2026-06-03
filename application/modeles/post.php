<?php
require_once "connect.php";

// Insère une photo en base. Le déplacement du fichier et la construction du
// chemin sont gérés par le contrôleur ; on reçoit ici le chemin déjà calculé.
function importPhoto($description, $date, $titre, $cheminFichier, $author_id)
{
    $dbh = connect();
    $sql = "INSERT INTO photos (author_id, description, file_path, upload_date, title)
            VALUES (:author_id, :desc, :file_path, :upload_date, :title)";

    $sth = $dbh->prepare($sql);
    $sth->execute([
        ":author_id" => $author_id,
        ":desc" => $description,
        ":file_path" => $cheminFichier,
        ":upload_date" => $date,
        ":title" => $titre,
    ]);
}
