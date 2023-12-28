<?php
require_once '../config/database.php';

$productId = 0;
$productName='';
$price=0.0;
$quantity=0;
$description='';
$origin='';
$categoryId=0;
$productImage;
if (isset($_POST['id'])) {
    $productId = $_POST['id'];
}
if (isset($_POST['name'])) {
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
    $productImage = $_POST['image'];
}
if (isset($_POST['categoryId'])) {
    $categoryId = $_POST['categoryId'];
}

$productModel = new Product();
// CÓ bug
if(empty($_FILES['image'])){
    $productModel->updateNoImage($productId, $productName, $quantity, $price, $description, $origin, $categoryId);
   
}else {
    
    $tempFileName = time() . '.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
    $target = '../asset/img/products/' . $tempFileName;

    if (is_uploaded_file($_FILES['image']['tmp_name']) && move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $productModel->updateAll($productId,$productName, $quantity, $price, $description ,$origin, $tempFileName, $categoryId);    
    }
}
