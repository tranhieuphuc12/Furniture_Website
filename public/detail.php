<?php
require_once '../config/database.php';



$productModel = new Product();
$products = $productModel->getProductByIdProduct($_GET['id']); // MANG nhieu san pham nhung thuc chat chi co 1 vif id laf duy nhat
$product = $products;
$template = new Template();

$recentView = [];
if (!isset($_COOKIE["recentView"])){
    array_push($recentView,$_GET['id']);
}
else {

    $recentView = json_decode($_COOKIE["recentView"] );
    if (!in_array($_GET['id'],$recentView)) {
        if (count($recentView) == 5) {
            array_shift($recentView);
        }
        array_push($recentView,$_GET['id']);
    }
}
setcookie("recentView",json_encode($recentView),time()+30);

$data = [
    'title'=>'Chi tiết sản phẩm',
    'slot'=>$template->render('blocks/product_detail',['product'=>$product])
];
$template->view('layout', $data);
?>