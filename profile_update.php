<?php
require_once 'config/database.php';

$memberModel = new Member();

if (isset($_POST['phone_number']) && isset($_POST['gender']) && isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $phoneNumber = $_POST['phone_number'];
    $gender = $_POST['gender'];
    
    try {
        $memberModel->update($username, $phoneNumber, $gender);
        $_SESSION['alert'] = "Update successfully ";

        header("location: profile_process.php");
        exit;

    } catch (\Throwable $th) {
        $_SESSION['alert'] = "Update unsuccessfully !!!";
        header("location: profile_process.php");
        exit;

    }
}else if (isset($_FILES['avatar']) && isset($_SESSION['username'])) {
    
    $imageData = file_get_contents($_FILES['avatar']['tmp_name']);    
    $username = $_SESSION['username'];
    
    try {
        $memberModel->updateAvatarImage($imageData,$username);
        $_SESSION['alert'] = "Update successfully";        
        header("location: profile_process.php");
        exit;
    } catch (\Throwable $th) {
        $_SESSION['alert'] = "Update unsuccessfully !!!";
        header("location: profile_process.php");
        exit;
    }
}else{
    echo "hoho";
}


