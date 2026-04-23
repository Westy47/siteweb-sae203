<?php
require('header.php');
?>

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

<?php
require('footer.php');
?>