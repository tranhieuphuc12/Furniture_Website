<?php
require_once '../config/database.php';


$productsRecent = [];
if(isset($_COOKIE['recentView'])) {
    $productModel = new Product();
    foreach (json_decode($_COOKIE['recentView']) as $id) {
        $product = $productModel->getProductByIdProduct($id); // MANG nhieu san pham nhung thuc chat chi co 1 vif id laf duy nhat
        array_push($productsRecent,$product);
    }
}
$template = new Template();
$data = [
    'title'=>'Chi tiết sản phẩm',
    'slot'=>$template->render('blocks/product_list',['productsRecent'=>$productsRecent])
];




