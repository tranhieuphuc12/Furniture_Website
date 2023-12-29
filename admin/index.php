<?php
require_once '../config/database.php';

$orderModel = new Order();
// $products = $orderModel->getAllOrderByStatusForOrderManagement(0);
$orders  = $orderModel->getAllOrdersAsc(0);



$template = new Template();
$slot = $template->render('admin_order_block', ['orders'=>$orders]);

$data = [
    'title'=>'Management Orders',
    'slot' =>$slot
];
$template->view('navbar_light_layout', $data);