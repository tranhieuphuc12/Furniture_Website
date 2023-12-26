<?php
require_once("config/database.php");
unset($_SESSION['username']);
header("location: index.php");   

