<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

session_start();

require "../modeles/connect.php";
require "../modeles/rating.php";

// var_dump(top3photos());

$podium = top3photos();

require "../vues/vuePodium.php";