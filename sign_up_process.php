<?php
require_once("config/database.php");

$memberModel = new Member();
if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['phone_number']) && isset($_POST['gender'])) {
    $username = $_POST['username'];
    $gender = $_POST['gender'];
    $phoneNumber = $_POST['phone_number'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $url = "https://t4.ftcdn.net/jpg/02/29/75/83/360_F_229758328_7x8jwCwjtBMmC6rgFzLFhZoEpLobB6L8.jpg";
    
    $urlImage = @file_get_contents($url);

    // var_dump($urlImage);
    try {
        $check = $memberModel->store($username, $password, $phoneNumber, $gender);
        $memberModel->updateAvatarImage($urlImage,$username);
        $_SESSION['alert'] = "Sign Up Successfully ";
        header("location: index.php");
        exit;
    } catch (\Throwable $th) {
        echo $th;
        // $_SESSION['alert'] = "Your username has already been used before !!!";
        // header("location: index.php");
        // exit;
    }


}