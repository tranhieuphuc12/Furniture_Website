<?php
session_start();
// Khai báo 4 hằng số chuẩn bị cho kết nối
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','project_be1');
// Can or can't define('DB_PORT','');

define('BASE_URL', $_SERVER['DOCUMENT_ROOT'] . "/Project_BE1/");

// Autoloading : tự động load các CLASS, database.php (!= Database.php) không phải là class
spl_autoload_register(function ($className) {
    require_once BASE_URL . "app/models/$className.php";
});



