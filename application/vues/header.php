<!DOCTYPE html>
<html lang="fr">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/global.css">
    <title>Site de concours photo</title>
</head>

<body>
    <header>
        <div id="menu">
        <?php if(isset($_SESSION['pseudo'])){ ?>
            <a href="accueil.php">Accueil</a>
            Connecté en tant que <?=$_SESSION['pseudo']?>
            <a href="deconnexion.php">Se déconnecter</a>
            <a href="postPhoto.php">Poster un photo</a>
        <?php }else{ ?>
            <a href="accueil.php">Accueil</a>
            <a href="connexion.php">Se connecter</a>
            <a href="inscription.php">S'inscrire</a>
        <?php } ?>
        </div>
    </header>