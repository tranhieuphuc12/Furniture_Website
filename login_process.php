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
            // if (isset($_POST['remember_me']) && $_POST['remember_me']== 'on') {
            //     $token = bin2hex(random_bytes(16));
            //     setcookie($username,$token,time()+(30*24*60*60),'/');
            //     $memberModel->storeToken($token,$username);
                
            // }

            header("location: index.php");   
            exit;
        } else if ($check === 'admin') {
            header("location: index.php");
        }
    } else {

    }
}