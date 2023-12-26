<?php
require_once 'config/database.php';


// if (!isset($_SESSION['username'])&& isset($_COOKIE['remember_me'])) {
//     $token = $_COOKIE['remember_me'];
//     $memberModel = new Member();
//     $userToken = $memberModel->getToken($_SESSION['username']);
//     $memberFound = strcmp($userToken,$token);
//     if ($memberFound === 0){
//         header('location: index.php');
//         exit;
//     }
// }

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