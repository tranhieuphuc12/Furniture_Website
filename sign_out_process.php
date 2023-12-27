<?php
require_once("config/database.php");
unset($_SESSION['username']);
unset($_SESSION['checkedPassword']);
header("location: index.php");   

