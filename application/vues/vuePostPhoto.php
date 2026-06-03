<?php require "header.php"; ?>
<link rel="stylesheet" href="../../public/css/form.css">

<div class="main-content">
    <form action="../controleurs/postPhoto.php" method="post" enctype="multipart/form-data" novalidate>
        <div>
            <h1>Poster une photo</h1>
            <label for="titre">Donnez un titre à votre poste:</label>
            <input type="text" name="titre" id="titre" required>

            <label for="desc">Donnez une description à votre poste:</label>
            <textarea name="desc" id="desc" cols="10"></textarea>

            <label class="file">
                <input type="file" id="file" aria-label="File browser example" name="img" required accept="image/png, image/jpeg">
                <span class="file-custom" data-content="Choose file..."></span>
            </label>

            <button type="submit">Envoyer</button>
        </div>
    </form>
</div>

<script>
document.getElementById('file').addEventListener('change', function () {
    this.nextElementSibling.dataset.content = this.files[0] ? this.files[0].name : 'Choose file...';
});

document.querySelector('form').addEventListener('submit', function (e) {
    this.classList.remove('was-validated');
    void this.offsetWidth; // force reflow pour reset anim
    this.classList.add('was-validated');
    if (!this.checkValidity()) {
        e.preventDefault();
    }
});
</script>

<?php require "footer.php"; ?>
