<?php require "header.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/form.css">
    <title>Poster une photo</title>
</head>
<body>
    <div class="main-content">
    <form action="../controleurs/postPhoto.php" method="post" enctype="multipart/form-data">
        <div>
            <h1>Poster une photo</h1>
        <label for="titre">Donnez un titre à votre poste:</label>
        <input type="text" name="titre" id="titre">

        <label for="desc">Donnez une description à votre poste:</label>
        <textarea name="desc" id="desc" cols="10" ></textarea>

        <label class="file">
            <input type="file" id="file" aria-label="File browser example">
            <span class="file-custom"></span>
        </label>

        <button type="submit">Envoyer</button>
        </div>
    </form>

    </div>
</body>
</html>