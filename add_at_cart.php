<?php
require_once 'config/database.php';
$productId = $_GET['productId'];
$quantity = $_GET['quantity'];
$orderId = $_SESSION['cart_id'];


$orderModel = new Order();
$orderProduct = $orderModel->updateQuantityProductInOrder($orderId, $productId, $quantity);
//Thay doi so luong san pham
$productModel = new Product();
$product = $productModel->updateQuantity($productId, $quantity * (-1));

header('location: http://localhost/Project_BE1/show_cart.php');