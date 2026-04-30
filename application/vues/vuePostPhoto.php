<?php require('header.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poster une photo</title>
</head>
<body>
    <form action="../controleurs/postPhoto.php" method="post" enctype="multipart/form-data">
        <label for="titre">Donnez un titre à votre poste:</label>
        <input type="text" name="titre" id="titre">

        <label for="desc">Donnez une description à votre poste:</label>
        <textarea name="desc" id="desc"></textarea>

        <label for="img">Joindre votre photo:</label>
        <input type="file" name="img" id="img">

        <button type="submit">Envoyer</button>
    </form>
</body>
</html>