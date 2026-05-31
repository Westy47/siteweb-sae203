<?php require "header.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/form.css">
    <title>vueInscription</title>
</head>
<body>
    <div class="main-content">
    <form action="../controleurs/inscription.php" method="post" novalidate>
        <div>
            <h1>S'Inscrire</h1>
        <label for="login">Login:</label>
        <input type="text" name="login" id="login" required>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>

        <label for="pwd">Mot de passe:</label>
        <input type="password" name="pwd" id="pwd" required>

        <select name="commune" id="commune">
            <option value="">-- Choisir une commune --</option>
            <?php foreach (getCom()['communes'] as $c): ?>
            <option value="<?= $c["code_insee"] ?>"><?= $c[
    "nom_standard"
] ?></option>
            <?php endforeach; ?>
        </select>

        <button type="submit">Inscrire</button>
        </div>
    </form>
    </div>
</body>
<script>
document.querySelector('form').addEventListener('submit', function (e) {
    this.classList.remove('was-validated');
    void this.offsetWidth;
    this.classList.add('was-validated');
    if (!this.checkValidity()) {
        e.preventDefault();
    }
});
</script>
</html>