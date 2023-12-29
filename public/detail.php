<?php
require_once '../config/database.php';


$producId;
if(isset($_GET['id'])){
    $producId = $_GET['id'];
}
$productModel = new Product();
$product = $productModel->getProductByIdProduct($producId); // MANG nhieu san pham nhung thuc chat chi co 1 vif id laf duy nhat
$template = new Template();

$recentView = [];
if (!isset($_COOKIE["recentView"])){
    array_push($recentView,$_GET['id']);
}
else {

    $recentView = json_decode($_COOKIE["recentView"] );
    if (!in_array($_GET['id'],$recentView)) {
        if (count($recentView) == 3) {
            array_shift($recentView);
        }
        array_push($recentView,$_GET['id']);
    }
}
setcookie("recentView",json_encode($recentView),time()+30);
$data = [
    'title'=>'Chi tiết sản phẩm',
    'slot'=>$template->render('product_detail_block',['product'=>$product])
];
$template->view('navbar_light_layout', $data);
?>