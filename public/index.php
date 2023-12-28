<?php
require_once '../config/database.php';

$keyword='';
$categoryId = 0;
$page = 1;
$perPage = 6;
$template = new Template();
$productModel = new Product();

if(isset($_GET['keyword'])){
    $keyword = $_GET['keyword'];
}
if(isset($_GET['categoryId'])){
    $categoryId = $_GET['categoryId'];
}
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}

$products = $productModel-> getProductsByParameter($page, $perPage, $keyword, $categoryId);
// $products = $productModel-> getProductsByPage($page, $perPage);
$total = $productModel-> getTotalQuantityProductByParameter($keyword,$categoryId)[0]['total'];
// Đổ dữ liệu vào blocks
$slot = $template->render('product_list_block', ['products' => $products,
                                                'perPage' => $perPage,
                                                'total' => $total,
                                                'page' =>$page
                                            ]);

// Chuẩn bị dữ liệu gồm các blocks có data đã được đổ vào block
$data = [
    'title' => 'Home',
    'slot' => $slot
];
// Gọi layout vào đây với dữ liệu đã làm ở trên
$template->view('navbar_dark_layout', $data);