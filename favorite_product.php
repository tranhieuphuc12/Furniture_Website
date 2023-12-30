<?php
require_once 'config/database.php';
$producId = 0;
$username;
if (isset($_SESSION['username'])){
    $username = $_SESSION['username'];
}
if (isset($_GET['productId'])) {
    $producId = $_GET['productId'];
}

$favModel = new Favorite();
$fav = $favModel->storeFavorite($username,$producId);
if ($fav == false) {
    $favModel->destroyFavorite($username,$producId);
}

header('location: http://localhost/Project_BE1/index.php');