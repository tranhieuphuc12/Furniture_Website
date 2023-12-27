<?php
require_once("config/database.php");


if (isset($_POST['username']) && isset($_POST['password'])&& isset($_POST['phone_number'])&& isset($_POST['gender'])) {
   $username = $_POST['username'];
   $gender = $_POST['gender'];
   $phoneNumber = $_POST['phone_number'];
   $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
   
   $memberModel = new Member();
try {
    $check = $memberModel->store($username,$password,$phoneNumber,$gender);
      
   $_SESSION['alert'] = "Sign Up Successfully ";
   header("location: index.php");   
    exit;
} catch (\Throwable $th) {
    $_SESSION['alert'] = "Your username has already been used before !!!";
    header("location: index.php");   
    exit;
}
   
 
}