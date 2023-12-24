<?php
require_once '../../config/database.php';

$productModel = new Product();
$products = $productModel->getAllProducts();

//var_dump($products);
$template = new Template();
$slot = $template->render('admin_order_block', ['products'=>$products]);

$data = [
    'title'=>'Management Order',
    'slot' =>$slot
];
$template->view('navbar_light_layout', $data);