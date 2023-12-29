<?php
require_once '../config/database.php';

$orderId = 0;
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
$memberModel = new Member();
$account = $memberModel->getAccount($username);

$template = new Template();
$slot = $template->render('profile_order_detail', ['products'=>$products,'status'=>$status,'account'=>$account]);
$data = [
    'title' => 'Home',
    'slot' => $slot
];
$template->view('navbar_light_layout', $data);