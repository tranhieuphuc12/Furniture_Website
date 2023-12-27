<?php
require_once '../config/database.php';

$username = 'thu';
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
}
$page = 1;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}
$perPage = 6;

$template = new Template();
$productModel = new Product();
$products = $productModel-> getProductsByPage($page, $perPage);
$total = $productModel-> getTotalQuantityProducts();
$listIdFav = $productModel->getProductsFav($username);
$productsFav = [];
foreach ($listIdFav as $id) {
    array_push($productsFav,$id['id']);
}
// Đổ dữ liệu vào blocks
$slot = $template->render('product_list_block', ['products' => $products,
                                                'perPage' => $perPage,
                                                'total' => $total,
                                                'page' =>$page,
                                                'productsFav'=>$productsFav
                                            ]);

// Chuẩn bị dữ liệu gồm các blocks có data đã được đổ vào block
$data = [
    'title' => 'Home',
    'slot' => $slot
];
// Gọi layout vào đây với dữ liệu đã làm ở trên
$template->view('navbar_dark_layout', $data);