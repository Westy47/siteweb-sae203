<!--  A faire -->
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require('../modeles/utilisateurs.php');
    
    $login = $_POST['login'];
    $pwd = $_POST['pwd'];
    
    if (connexionOk($login, $pwd)) {
        header('Location:../../index.php');
        exit;
    }
}

require('../vues/vueConnexion.php');


