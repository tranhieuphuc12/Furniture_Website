<?php
require_once '../config/database.php';


$products = [];
if(isset($_COOKIE['recentView'])) {
    $productModel = new Product();
    foreach (json_decode($_COOKIE['recentView']) as $id) {
        $product = $productModel->getProductByIdProduct($id); // MANG nhieu san pham nhung thuc chat chi co 1 vif id laf duy nhat
        array_push($products,$product);
    }
}
$template = new Template();
$data = [
    'title'=>'Chi tiết sản phẩm',
    'slot'=>$template->render('blocks/product_list',['products'=>$products])
];

$template->view('layout', $data);
?>

