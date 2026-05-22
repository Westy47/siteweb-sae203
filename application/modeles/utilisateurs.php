<?php
// Connextion à la BDD + verif de mdp
function connexionOk($pseudo, $pw)
{
    require "connect.php";
    $dbh = connect();

    $sql = "SELECT * FROM users WHERE alias=:pseudo";
    $sth = $dbh->prepare($sql);
    $sth->execute([":pseudo" => $pseudo]);
    $result = $sth->fetch(PDO::FETCH_ASSOC);

    if ($result && $pw === $result["password"]) {
        return $result["id"];
    }
    return false;
}

function getCom()
{
    $dbh = connect();

    $sql = "SELECT * FROM communes";
    $sth = $dbh->prepare($sql);
    $sth->execute();
    $results = $sth->fetchAll(PDO::FETCH_ASSOC);

    return ['communes' => $results, 'total' => count($results)];
}

function addUser($login, $email, $pwd, $com)
{
    $dbh = connect();

    $sql = "INSERT INTO users (alias, email, password, commune)
            VALUES (:alias, :email, :pwd, :commune)";

    $sth = $dbh->prepare($sql);
    $sth->execute([
        ":alias" => $login,
        ":email" => $email,
        ":pwd" => $pwd,
        ":commune" => $com,
    ]);
}
