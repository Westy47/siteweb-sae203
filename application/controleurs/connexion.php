<!--  A faire -->
<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require('../modeles/utilisateurs.php');
    
    $login = $_POST['login'];
    $pwd = $_POST['pwd'];
    
    if (connexionOk($login, $pwd)) {
        $_SESSION['pseudo'] = $login;
        header('Location:../../index.php');
        exit;
    }else{
        $_POST = [];
        $_SESSION['error'] = 'Le pseudo ou le login est incorect';
        header('Location:connexion.php');
        exit;
    }
}

require('../vues/vueConnexion.php');


