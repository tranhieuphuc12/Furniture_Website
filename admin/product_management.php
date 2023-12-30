<?php
require_once '../config/database.php';

$template = new Template();
$productModel = new Product();
$categoryModel = new Category();
$categories = $categoryModel->getAllCategories();

// Get products by Page
$page = 1;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}
$perPage = 5;
$products = $productModel-> getProductsByPage($page, $perPage);
$total = $productModel-> getTotalQuantityProducts();
// End
$slot = $template->render('admin_product_block', ['products'=>$products, 
                                                'categories'=>$categories, 
                                                'perPage' => $perPage,
                                                'total' => $total,
                                                'page' =>$page]);

$data = [
    'title'=>'Management Products',
    'slot' =>$slot
];
$template->view('navbar_light_admin', $data);