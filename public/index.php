<?php
require_once '../config/database.php';

$keyword='';
$categoryId = 0;
$username = 'thu';
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
}
$page = 1;
$perPage = 6;
$template = new Template();
$productModel = new Product();
$categoryModel = new Category();

if(isset($_GET['keyword'])){
    $keyword = $_GET['keyword'];
}
if(isset($_GET['categoryId'])){
    $categoryId = $_GET['categoryId'];
}
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}



$listIdFav = $productModel->getProductsFav($username);
$favModel = new Favorite();
$listFav = $favModel->getAllProductFav($username);
$productsFav = [];
foreach ($listIdFav as $id) {
    array_push($productsFav,$id['id']);
}

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
$total = $productModel-> getTotalQuantityProductByParameter($keyword,$categoryId)[0]['total'];
$categories = $categoryModel->getAllCategories();

//Xử lí recent
$productsRecent = [];
if(isset($_COOKIE['recentView'])) {
    foreach (json_decode($_COOKIE['recentView']) as $id) {
        $product = $productModel->getProductByIdProduct($id); // MANG nhieu san pham nhung thuc chat chi co 1 vif id laf duy nhat
        array_push($productsRecent,$product);
    }
}


// Đổ dữ liệu vào blocks
$template = new Template();
$slot = $template->render('product_list_block', ['products' => $products,
                                                'perPage' => $perPage,
                                                'total' => $total,
                                                'page' =>$page,
                                                'productsFav'=>$productsFav,
                                                'listFav' => $listFav,
                                                'keyword' => $keyword,
                                                'categoryId'=>$categoryId,
                                                'categories' => $categories,
                                                'productsRecent'=>$productsRecent
                                            ]);

// Chuẩn bị dữ liệu gồm các blocks có data đã được đổ vào block
$data = [
    'title' => 'Home',
    'slot' => $slot
];
// Gọi layout vào đây với dữ liệu đã làm ở trên
$template->view('navbar_dark_layout', $data);