<?php
require "../modeles/connect.php";
require "../modeles/utilisateurs.php";
?>

<?php if ($_SERVER["REQUEST_METHOD"] === "POST") {
    addUser($_POST["login"], $_POST["email"], $_POST["pwd"], $_POST["commune"]);

    header("Location: ../../");
    exit();
} else {
    require "../vues/vueInscription.php";
}
?>
