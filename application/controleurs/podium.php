<?php
session_start();

require "../modeles/rating.php";

$podium = top3photos();

require "../vues/vuePodium.php";
