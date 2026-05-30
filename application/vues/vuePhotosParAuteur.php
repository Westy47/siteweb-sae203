<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Photos par auteur</title>
    <style>
        body {
            font-family: sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 2rem;
            background: #f5f5f5;
        }
        .chart-container {
            background: white;
            border-radius: 8px;
            padding: 1.5rem;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 800px;
        }
    </style>
</head>
<body>
    <h2>Nombre de photos publiées par auteur</h2>
    <div class="chart-container">
        <canvas id="chartPhotosAuteur"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const labels = <?= json_encode($labels) ?>;
        const values = <?= json_encode(array_map("intval", $values)) ?>;

        new Chart(document.getElementById('chartPhotosAuteur'), {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Nombre de photos',
                    data: values,
                }]
            },
        });
    </script>
</body>
</html>