<!--  A faire -->
<?php
session_start();
// On vérifie si des données ont déjà étés envoyées 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require('../modeles/utilisateurs.php');
    
    $login = $_POST['login'];
    $pwd = $_POST['pwd'];
    
    // On redirige l'user vers l'accueil en enregistrant son pseudo
    if (connexionOk($login, $pwd)) {
        $_SESSION['pseudo'] = $login;
        header('Location:../../index.php');
        exit;
    // Faute = erreur : autre tentative
    }else{
        $_POST = [];
        $_SESSION['error'] = 'Le pseudo ou le login est incorect';
        header('Location:connexion.php');
        exit;
    }
}

require('../vues/vueConnexion.php');


