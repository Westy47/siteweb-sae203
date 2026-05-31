<?php
require "header.php"; ?>
<link rel="stylesheet" href="../../public/css/form.css">
<!-- Création du formulaire -->
<div class="main-content">
    <form action="../controleurs/connexion.php" method="post" novalidate>
        <div>
            <h1>Se connecter</h1>
            <label for="login">Nom utilisateur</label>
            <input type="text" name="login" id="login" required>
            <label for="pwd">Mot de passe</label>
            <input type="password" name="pwd" id="pwd" required>
            <button type="submit">Connexion</button>
        </div>
    </form>
</div>
<!-- Message d'erreur si le mdp est incorrect -->
<?php if (isset($_SESSION["error"])): ?>
<p class="error"><?= $_SESSION["error"] ?></p>
<?php unset($_SESSION["error"]);endif; ?>

<?php require "footer.php";
?>

<script>
document.querySelector('form').addEventListener('submit', function (e) {
    this.classList.remove('was-validated');
    void this.offsetWidth; // force reflow pour réinitialiser l'animation
    this.classList.add('was-validated');
    if (!this.checkValidity()) {
        e.preventDefault();
    }
});
</script>