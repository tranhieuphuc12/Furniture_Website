<?php
require_once '../config/database.php';
$username;

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
}

$template = new Template();
$productOrder = new Order();
$products = $productOrder->getProductToCart($username,0);

//Account
$memberModel = new Member();
$account = $memberModel->getAccount($username);

$slot = $template->render('cart_block',['products'=>$products, 'account'=>$account]);


$data = [
    'title' => "Cart",
    'slot' => $slot
];
$template->view('navbar_light_layout',$data);