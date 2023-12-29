<?php
require_once '../config/database.php';

$productId;
$quantity;
$price;
if(isset($_GET['productId'])){
    $productId = $_GET['productId'];
}
if(isset($_GET['quantity'])){
    $quantity = $_GET['quantity'];
}
if(isset($_GET['price'])){
    $price = $_GET['price'];
}

//Lay orderId
$orderModel = new Order();
$orderIds = $orderModel->getOrderIds($username, 0);
$orderId = $orderIds[0]['order_id'];

//TH: khong co ordeId voi status 0
if (empty($orderIds)) {
    $orderIds = $orderModel->storeOrder($username);
    $orderIds = $orderModel->getOrderIds($username, 0);
    $orderId = $orderIds[0]['order_id'];
    $orderProduct = $orderModel->storeProductIntoOrder($orderId, $productId, $price, $quantity);
}
//TH: co ton tai orderID voi status 0
else {
    $productIdExist = $orderModel->checkExist($orderId, $productId);
    //Chua co san pham ton tai trong hon hang 
    if (empty($productIdExist)) {
        $orderProduct = $orderModel->storeProductIntoOrder($orderId, $productId, $price, $quantity);
    }
    //Da co san pham, khi add thi tang so luong cua san pham trong don hang
    else {
        $orderProduct = $orderModel->updateQuantityProductInOrder($orderId, $productId, $quantity);
    }
}
$_SESSION['cart_id'] = $orderId;

//Thay doi so luong san pham
$productModel = new Product();
$product = $productModel->updateQuantity($productId, $quantity * (-1));


header('location: http://localhost/Project_BE1/public/index.php');