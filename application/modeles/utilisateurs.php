<?php
// Connextion à la BDD + verif de mdp
function connexionOk($pseudo, $pw)
{
    require('connect.php');
    $dbh = connect();

    $sql = "SELECT password FROM users WHERE alias=:pseudo";
    $sth = $dbh->prepare($sql);
    $sth->execute([':pseudo' => $pseudo]);
    $result = $sth->fetch(PDO::FETCH_ASSOC);

    return $pw === $result['password'];
}