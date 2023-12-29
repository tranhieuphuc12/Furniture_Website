<?php
require_once '../config/database.php';
$productId;
if(isset($_GET['productId'])){
    $productId = $_GET['productId'];
    $productModel = new Product();
    $productModel->setQuantity($productId, 0);
    header('location: http://localhost/Project_BE1/admin/product_management.php');
}

