<?php
require_once '../config/database.php';

$productName='';
$price=0.0;
$quantity=0;
$description='';
$origin='';
$categoryId=0;
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
if (isset($_POST['categoryId'])) {
    $categoryId = $_POST['categoryId'];
}
$productModel = new Product();

if(!empty($productName) && !empty($price) && !empty($quantity) && !empty($description) && !empty($origin) && !empty($_FILES['image']) && !empty($categoryId)){
    $productModel = new Product();

    $tempFileName = time() . '.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
    $target = '../asset/img/products/' . $tempFileName;

    if (is_uploaded_file($_FILES['image']['tmp_name']) && move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        if($productModel->store($productName, $quantity, $price, $description ,$origin, $tempFileName, $categoryId)) {
            header('location: http://localhost/Project_BE1/admin/product_management.php');
        }
    }

}

