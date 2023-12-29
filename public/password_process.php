<?php 
require_once '../config/database.php';

$memberModel = new Member();
if (isset($_POST['oldPassword']) && isset($_SESSION['username'])) {
    $oldPassword = $_POST['oldPassword'];
    $newPassword = $memberModel->getPassword($_SESSION['username']);
    
    if (password_verify($oldPassword,$newPassword)) {
        $_SESSION['checkedPassword'] = "checked";        
        header("location: profile_process.php");
        exit;
    }else{
        $_SESSION['checkedPassword'] = "fail";      
        header("location: profile_process.php");
        exit;
    }
}   
else if (isset($_POST['verify_password'])&& isset($_SESSION['username'])) {
    $newPassword = $_POST['verify_password'];
    $username = $_SESSION['username'];
    $newPassword = password_hash($newPassword,PASSWORD_DEFAULT);
    try {
        $memberModel->updatePassword($newPassword,$username);
        $_SESSION['alert'] = "Change Password Successfully";
        unset($_SESSION['checkedPassword']);
        header("location: profile_process.php");
        exit;
    } catch (\Throwable $th) {       
        
        $_SESSION['alert'] = "Change Password Unsuccessfully !!!";
        header("location: profile_process.php");
        exit;
    }
    
    



}