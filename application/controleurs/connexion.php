<!--  A faire -->
<?php
session_start();
// On vérifie si des données ont déjà étés envoyées
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require "../modeles/utilisateurs.php";

    $login = $_POST["login"];
    $pwd = $_POST["pwd"];

    // On redirige l'user vers l'accueil en enregistrant son pseudo
    $userId = connexionOk($login, $pwd);
    if ($userId !== false) {
        $_SESSION["pseudo"] = $login;
        $_SESSION["userId"] = $userId;
        header("Location:../../index.php");
        exit();
        // Faute = erreur : autre tentative
    } else {
        $_POST = [];
        $_SESSION["error"] =
            'Le nom d\'utilisateur ou le mot de passe est incorrect';
        header("Location:connexion.php");
        exit();
    }
}

require "../vues/vueConnexion.php";

