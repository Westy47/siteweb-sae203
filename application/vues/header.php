<!DOCTYPE html>
<html lang="fr">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/global.css">
    <link rel="stylesheet" href="../../public/css/header.css">
    <title>Site de concours photo</title>
</head>

<body>
    <header>
        <h1>Concours de photographie</h1>
        <div id="menu">
        <?php if(isset($_SESSION['pseudo'])){ ?>
            <a href="accueil.php">Accueil</a>
            <a href="postPhoto.php">Poster un photo</a>
            <span class="user-info">Connecté en tant que <?= htmlspecialchars($_SESSION['pseudo'], ENT_QUOTES, 'UTF-8') ?></span>
            <a class="warning-button" href="deconnexion.php">Se déconnecter</a>
        <?php }else{ ?>
            <a href="accueil.php">Accueil</a>
            <a href="connexion.php">Se connecter</a>
            <a href="inscription.php">S'inscrire</a>
        <?php } ?>
        </div>
    </header>