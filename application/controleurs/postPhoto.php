<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
session_start();
require "../modeles/connect.php";
require "../modeles/post.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $dbh = connect();
    $stmt = $dbh->prepare("SELECT id FROM users WHERE alias = :alias");
    $stmt->execute([":alias" => $_SESSION["pseudo"]]);
    $user = $stmt->fetch();
    $author_id = $user["id"];

    $date = date("Y-m-d H:i:s");
    importPhoto(
        $_POST["desc"],
        $date,
        $_POST["titre"],
        $_FILES["img"]["tmp_name"],
        $author_id,
    );

    header("Location: ../../");
    exit();
} else {
    require "../vues/vuePostPhoto.php";
}
