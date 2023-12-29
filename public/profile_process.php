<?php
require_once 'config/database.php';

$username = isset($_SESSION['username'])?$_SESSION['username']:null;

$memberModel = new Member();
$template = new Template();
$userInfo = $memberModel->getMember($username);

$slot = $template->render('profile_block',['username' => $username,
                                           'phoneNumber' => $userInfo['phone_number'],
                                           'gender' => $userInfo['gender'],
                                            'avatar' => $userInfo['avatar'],
                                            'password' => $userInfo['password']]);
$data = [
    'title' => 'Profile',
    'slot' => $slot
];
$template->view('navbar_light_layout', $data);

