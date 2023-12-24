<?php
require_once("config/database.php");



if (isset($_POST['username']) && isset($_POST['password'])) {
   $username = $_POST['username'];
   $pasword = $_POST['password'];
   
   $memberModel = new Member();
   $check = $memberModel->login($username,$pasword);
   
   if ($check != null ) {
        if ($check === 'user') {
            $header = 'location: index.php';
            header($header);
        }
   }
}