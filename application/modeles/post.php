<?php
function importPhoto($description, $date, $titre, $nomTemporaire, $author_id) {
    $dbh = connect();
    $titre_compact = str_replace(' ', '_', $titre);
    $chemin = 'public/media/images/'.$titre_compact.'.jpg';
    move_uploaded_file($nomTemporaire, '../../' . $chemin);
    $sql = "INSERT INTO photos (author_id, description, file_path, upload_date, title)
            VALUES (:author_id, :desc, :file_path, :upload_date, :title)";

    $sth = $dbh->prepare($sql);
    $sth->execute([
        ':author_id' => $author_id,
        ':desc' => $description,
        ':file_path' => $chemin,
        ':upload_date' => $date,
        ':title' => $titre,
    ]);
}
?>