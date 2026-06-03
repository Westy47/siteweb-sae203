<?php
// Contrôleur présent uniquement pour vérifier la connexion à la base de données.
require_once "../modeles/connect.php";

try {
    $dbh = connect();
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh->query("SELECT 1");
    echo "Connexion à la base de données réussie.";
} catch (PDOException $e) {
    echo "Échec de la connexion à la base de données.";
}
