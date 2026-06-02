<?php require "header.php"; ?>
<link rel="stylesheet" href="../../public/css/global.css">
<style>
    .podium { display: flex; justify-content: center; align-items: flex-end; gap: 1rem; margin: 2rem; }
    .place { text-align: center; background: white; padding: 1rem; border: 1px solid #ccc; box-shadow: 0 2px 5px rgba(0,0,0,0.1);}
    .place img { width: 200px; height: 150px; object-fit: cover; display: block; }
    .or     { border-color: gold; }
    .argent { border-color: silver; }
    .bronze { border-color: #cd7f32; }
</style>

<h2 style="text-align:center">Podium</h2>

<div class="podium">
<?php foreach ($podium as $key => $place): ?>
    <?php switch ($key): case 0: ?>
        <div class="place or">
            <p>🥇 1ère place</p>
            <img src="../../<?= htmlspecialchars(
                $place["file_path"],
            ) ?>" alt="<?= htmlspecialchars($place["title"]) ?>">
            <p><?= htmlspecialchars($place["title"]) ?></p>
            <p><?= round($place["moyenne"], 1) ?> / 5 ⭐</p>
        </div>
    <?php break;case 1: ?>
        <div class="place argent">
            <p>🥈 2ème place</p>
            <img src="../../<?= htmlspecialchars(
                $place["file_path"],
            ) ?>" alt="<?= htmlspecialchars($place["title"]) ?>">
            <p><?= htmlspecialchars($place["title"]) ?></p>
            <p><?= round($place["moyenne"], 1) ?> / 5 ⭐</p>
        </div>
    <?php break;case 2: ?>
        <div class="place bronze">
            <p>🥉 3ème place</p>
            <img src="../../<?= htmlspecialchars(
                $place["file_path"],
            ) ?>" alt="<?= htmlspecialchars($place["title"]) ?>">
            <p><?= htmlspecialchars($place["title"]) ?></p>
            <p><?= round($place["moyenne"], 1) ?> / 5 ⭐</p>
        </div>
    <?php break;endswitch; ?>
<?php endforeach; ?>
</div>
<div id="parent">
      <button class="close-btn"></button>
      <img src="https://placehold.co/600x400" alt="placeholder" id="bigPic">
</div>

<?php require "footer.php"; ?>
<script src="../../public/js/bigPic.js"></script>