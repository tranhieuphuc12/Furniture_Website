<?php
require_once '../config/database.php';
$username = 'thu';
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
}

$template = new Template();
$productOrder = new Order();
$products = $productOrder->getProductByUsernameStatus($username,0);

$slot = $template->render('cart_block',['products'=>$products]);


$data = [
    'title' => "Cart",
    'slot' => $slot
];
$template->view('navbar_light_layout',$data);