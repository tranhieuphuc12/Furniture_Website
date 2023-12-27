<?php
require_once '../config/database.php';

$template = new Template();
$productModel = new Product();
$categoryModel = new Category();
$products = $productModel->getAllProducts();
$categories = $categoryModel->getAllCategories();
var_dump($categories);
$slot = $template->render('admin_product_block', ['products'=>$products, 'categories'=>$categories]);

$data = [
    'title'=>'Management Products',
    'slot' =>$slot
];
$template->view('navbar_light_layout', $data);