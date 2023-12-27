<?php
require_once '../config/database.php';
$productId;
$productName;
$price;
$quantity;
$description;
$origin;
$image;
$categoryId;
if (isset($_POST['id'])) {
    $productId = $_POST['id'];
}
if (isset($_POST[''])) {
    $productName = $_POST['name'];
}
if (isset($_POST['price'])) {
    $price = $_POST['price'];
}
if (isset($_POST['quantity'])) {
    $quantity = $_POST['quantity'];
}
if (isset($_POST['description'])) {
    $description = $_POST['description'];
}
if (isset($_POST['origin'])) {
    $origin = $_POST['origin'];
}
if (isset($_POST['image'])) {
    $image = $_POST['image'];
}
if (isset($_POST['categoryId'])) {
    $image = $_POST['categoryId'];
}


$template = new Template();
$productModel = new Product();


header('location: http://localhost/Project_BE1/admin/product_management.php');