<?php
require_once '../config/database.php';
session_start();
$_SESSION['username']="thu";
$producId = 0;
$username = "unknown";
if (isset($_SESSION['username'])){
    $username = $_SESSION['username'];
}
if (isset($_GET['productId'])) {
    $producId = $_GET['productId'];
}

$favModel = new Favorite();
$fav = $favModel->storeFavorite($username,$producId);

header('location: http://localhost/Project_BE1/');