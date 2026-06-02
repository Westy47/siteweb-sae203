<!DOCTYPE html>
<html lang="fr">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/global.css">
    <link rel="stylesheet" href="../../public/css/header.css">
    <script src="../../public/js/header.js" defer></script>
    <title>Site de concours photo</title>
</head>

<body>
    <header>
        <h1>Concours de photographie</h1>
        <div id="burger" class="menu"><svg width="28" height="28" viewBox="0 0 16 16" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" stroke="currentColor" fill="none" role="graphics-symbol" class="inline-block relative -top-[2px]"><path d="m2.75 12.25h10.5m-10.5-4h10.5m-10.5-4h10.5"></path><!----></svg></div>
        <div id="nav"class="menu">
        <?php if (isset($_SESSION["pseudo"])) { ?>
            <a href="accueil.php">Accueil</a>
            <a href="podium.php">Podium</a>
            <a href="postPhoto.php">Poster une photo</a>
            <span class="user-info">Connecté en tant que <?= htmlspecialchars(
                $_SESSION["pseudo"],
                ENT_QUOTES,
                "UTF-8",
            ) ?></span>
            <a class="warning-button" href="deconnexion.php">Se déconnecter</a>
        <?php } else { ?>
            <a href="accueil.php">Accueil</a>
            <a href="connexion.php">Se connecter</a>
            <a href="inscription.php">S'inscrire</a>
        <?php } ?>
        </div>
    </header>