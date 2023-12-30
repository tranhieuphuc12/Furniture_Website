<?php
require_once '../config/database.php';

$productId=0;
$productModel = new Product();
$categoryModel = new Category();
$product;
$page=1;
if(isset($_GET['page'])){
    $page=$_GET['page'];
}
$categories = $categoryModel->getAllCategories();
if (isset($_GET['productId'])) {
    $productId = $_GET['productId'];
    $product = $productModel->getProductByIdProduct($productId);
}
$template = new template();
$slot = $template->render('admin_product_edit', ['product'=> $product,
                                                'categories'=>$categories,
                                            'page'=>$page]);

$data = [
    'title'=>'Edit product',
    'slot' =>$slot
];
$template->view('navbar_light_admin', $data);