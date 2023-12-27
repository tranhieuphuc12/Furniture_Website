<?php
require_once '../config/database.php';
var_dump($username);
$productId = $_GET['productId'];
$quantity = $_GET['quantity'];
$orderId = $_SESSION['cart_id'];

$orderModel = new Order();
//Cap nhat so luong cua san pham trong gio hang
$orderProduct = $orderModel->updateQuantityProductInOrder($orderId, $productId, $quantity);
//Thay doi so luong san pham
$productModel = new Product();
$product = $productModel->updateQuantity($productId, $quantity * (1));

header('location: http://localhost/Project_BE1/public/show_cart.php');