<?php
require_once '../config/database.php';
$username;
if (isset($_SESSION['username'])){
    $username = $_SESSION['username'];
}
$producId = 0;
if (isset($_GET['productId'])) {
    $producId = $_GET['productId'];
}
$quantity = 0;
if (isset($_GET['quantity'])) {
    $quantity = $_GET['quantity'];
}
$orderModel = new Order();
$productOrder = $orderModel->destroyProductInCart($username,$producId);
$productModel = new Product();
$product = $productModel->updateQuantity($producId,$quantity);
header('location: http://localhost/Project_BE1/public/show_cart.php');