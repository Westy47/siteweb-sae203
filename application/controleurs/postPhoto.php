<?php
session_start();

require_once "../modeles/connect.php";
require "../modeles/post.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $dbh = connect();
    $stmt = $dbh->prepare("SELECT id FROM users WHERE alias = :alias");
    $stmt->execute([":alias" => $_SESSION["pseudo"]]);
    $user = $stmt->fetch();
    $author_id = $user["id"];

    $date = date("Y-m-d H:i:s");

    // Construction du nom de fichier et déplacement de l'upload (logique de contrôleur)
    $titreCompact =
        $_SESSION["pseudo"] . "-" . str_replace(" ", "_", $_POST["titre"]);
    $chemin = "public/media/images/" . $titreCompact . ".jpg";
    move_uploaded_file($_FILES["img"]["tmp_name"], "../../" . $chemin);

    importPhoto($_POST["desc"], $date, $_POST["titre"], $chemin, $author_id);

    header("Location: ../../");
    exit();
} else {
    require "../vues/vuePostPhoto.php";
}
