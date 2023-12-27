<?php
require_once 'config/database.php';

$memberModel = new Member();

if (isset($_POST['phone_number']) && isset($_POST['gender'])) {
    $username = $_POST['username'];
    $phoneNumber = $_POST['phone_number'];
    $gender = $_POST['gender'];

    try {
        $memberModel->update($username, $phoneNumber, $gender);
        $_SESSION['alert'] = "Update successfully ";

        $memberModel = new Member();
        $template = new Template();
        $userInfo = $memberModel->getMember($username);

        $slot = $template->render('profile_block', ['username' => $username,
            'phoneNumber' => $userInfo['phone_number'],
            'gender' => $userInfo['gender']]);
        $data = [
            'title' => 'Profile',
            'slot' => $slot
        ];
        $template->view('navbar_light_layout', $data);

    } catch (\Throwable $th) {
        echo "hoho";
    }
}