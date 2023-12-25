<?php
require_once 'config/database.php';

$page = 1;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}
$perPage = 6;

$template = new Template();
$productModel = new Product();
$products = $productModel-> getProductsByPage($page, $perPage);
$total = $productModel-> getTotalQuantityProducts();
 
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