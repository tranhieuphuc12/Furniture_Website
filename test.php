<?php
session_start();
$_SESSION['username']="thu";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form action="add_to_cart.php">
        <input type="text" name="productId" value="1">
        <input type="text" name="quantity" value="2">
        <input type="text" name="price" value="3">
        <input type="submit" value="Add">
    </form>
    
</body>
</html>