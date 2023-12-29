<?php
require_once '../config/database.php';

$orderModel = new Order();
$orderId=0;
if (isset($_GET['orderId'])) {
    $orderId =$_GET['orderId'];
    //Chuyen trang thai thanh 2
    $orderModel->updateStatus($orderId, 2);
    // Cap nhat vao bang member cot accumulate += tong don

    header('location: http://localhost/Project_BE1/admin/');
}

