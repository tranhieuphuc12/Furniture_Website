<?php
require_once '../config/database.php';
setcookie('remember_me','',-1,'/');
unset($_SESSION['username']);
unset($_SESSION['checkedPassword']);
header('location: http://localhost/Project_BE1/public/index.php') ;

