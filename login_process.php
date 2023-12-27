<?php
require_once("config/database.php");

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];


    $memberModel = new Member();
    $check = $memberModel->login($username, $password);

    if ($check != null) {
        $_SESSION['username'] = $username;
        if ($check === 'user' || $check === 'premium') {
            header("location: index.php");
            exit;
        } else if ($check === 'admin') {
            header("location: index.php");
            exit;
        }
    } else {
        $_SESSION['alert'] = "Your password or username might be wrong!!!";
        header("location: index.php");
        exit;        
    }
}
