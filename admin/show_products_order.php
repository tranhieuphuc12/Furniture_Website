<?php
require_once '../config/database.php';
$orderId = 0;
$username = "";
$status=0;
if (isset($_GET['orderId'])) {
    $orderId =$_GET['orderId'];
}
if (isset($_GET['username'])) {
    $username =$_GET['username'];
}
if (isset($_GET['status'])) {
    $status =$_GET['status'];
}

$orderModel = new Order();
$products = $orderModel->getProductsByOrderId($orderId);
var_dump($products);
$template = new Template();
$slot = $template->render('admin_order_detail',['products'=>$products,
                                                'username' => $username,
                                                'status'=>$status]);
$data = [
    'title' => 'Detail Order',
    'slot' => $slot
];
$template->view('navbar_light_layout', $data);