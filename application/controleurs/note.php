<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);
session_start();

require "../modeles/connect.php";
require "../modeles/rating.php";

$userID = $_SESSION["userId"];
$photoId = $_GET["photo_id"];
$rating = $_GET["rating"];

importRating($photoId, $userID, $rating);

header("Location: ../../");
exit();
