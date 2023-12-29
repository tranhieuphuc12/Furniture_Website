<?php
require_once '../config/database.php';

$orderModel = new Order();
$accountModel = new Member();
$orderId=0;
if (isset($_GET['orderId'])) {
    $orderId = $_GET['orderId'];
    //Chuyen trang thai thanh 2
    $orderModel->updateStatus($orderId, 2);
    // Cap nhat vao bang member cot accumulate += tong don
    $products = $orderModel->getProductsByOrderId($orderId);
    $total= 0;
    foreach ($products as $product) {
        $total += $product['quantity'] * $product['price'];
    }
    $username = $orderModel->getUsernameByOrderId($orderId)[0]['username'];
    $accountModel->updateAccumlation($username, $total);

    header('location: http://localhost/Project_BE1/mail/sendMailAccept.php?username='.$username);
}

