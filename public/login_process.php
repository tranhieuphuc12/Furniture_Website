<?php
require_once '../config/database.php';

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $memberModel = new Member();
    $check = $memberModel->login($username, $password);
   
    if ($check != null) {
        $_SESSION['username'] = $username;
        if ($check === 'user' || $check === 'premium') {
            if (isset($_POST['remember_me']) && $_POST['remember_me'] == 'on') {
                $token = bin2hex(random_bytes(16));
                echo $token;
                setcookie('remember_me', $token, time() + (30 * 24 * 60 * 60), '/');
                try {
                    $memberModel->storeToken($token,$_SESSION['username']);
                } catch (\Throwable $th) {
                    echo $th;
                }
                
            }
            header("location: index.php");
            exit;
        } else if ($check === 'admin') {
            $_SESSION['roleAdmin'] = $check;
            header('location: http://localhost/Project_BE1/admin/index.php');
        }
    } else {
         $_SESSION['alert'] = "Your password or username might be wrong!!!";
        header("location: index.php");
        exit;
    }
}