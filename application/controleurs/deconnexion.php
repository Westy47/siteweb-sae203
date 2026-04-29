<?php
$_SESSION = [];
session_unset();

header('Location: accueil.php');