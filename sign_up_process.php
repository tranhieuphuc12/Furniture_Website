<?php
require_once("config/database.php");


if (isset($_POST['username']) && isset($_POST['password'])&& isset($_POST['phone_number'])) {
   $username = $_POST['username'];
   $phoneNumber = $_POST['phone_number'];
   $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
   
   $memberModel = new Member();
   $check = $memberModel->store($username,$password,$phoneNumber);
   
   $_SESSION['alert'] = "Sign Up Successfully ";
   header("location: index.php");   

}else{
    $_SESSION['alert'] = "Please, You Have To Fill Out Both Password and Username!!!";
}
