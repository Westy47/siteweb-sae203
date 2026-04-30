<?php
require('header.php');
?>
<link rel="stylesheet" href="../../public/css/connexion.css">
<!-- Création du formulaire -->
<div class="main-content">
    <form action="../controleurs/connexion.php" method="post">
        <div>
            <h1>Se connecter</h1>
            <label for="login">Nom utilisateur</label>
            <input type="text" name="login" id="login">
            <label for="pwd">Mot de passe</label>
            <input type="password" name="pwd" id="pwd">
        </div>
    <button type="submit">Connexion</button>
    </form>
</div>
<!-- Message d'erreur si le mdp est incorrect -->
<?php if(isset($_SESSION['error'])): ?>
<p class="error"><?=$_SESSION['error']?></p>
<?php unset($_SESSION['error']);
endif ?>

<?php
require('footer.php');
?>