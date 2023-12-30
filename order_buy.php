<?php

require_once 'config/database.php';
$orderId = 0;
if ($_SESSION['cart_id']){
    $orderId = $_SESSION['cart_id'];
}

$orderModel = new Order();
$order = $orderModel->updateStatus($orderId,1);
unset($_SESSION['cart_id']);
header('location: http://localhost/Project_BE1/mail/sendMailConfirm.php');