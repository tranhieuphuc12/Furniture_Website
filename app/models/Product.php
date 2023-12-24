<?php

class Product extends Database{
    // Lấy sản phẩm theo trang
    public function getProductsByPage($page, $perPage)
    {
        $start = ($page - 1) * $perPage;
        // 2. Tạo câu SQL
        $sql = parent::$connection->prepare("SELECT * FROM `products` LIMIT $start, $perPage");
        return parent::select($sql); 
    }
    
    // Lấy tổng sản phẩm
    public function getTotalProducts()
    {
        // 2. Tạo câu SQL
        $sql = parent::$connection->prepare("SELECT COUNT(*) AS total FROM `products`");
        return parent::select($sql)[0]['total'];
    }
    //Giảm số lượng hàng ứng với mã sản phẩm
    public function updateQuantity($productId, $quantity)
    {
        // Nếu giảm số lượng thì truyền $quantity là biến có giá trị âm và ngược lại
        $sql = parent::$connection->prepare('UPDATE `products` SET `quantity`= `quantity` + ?  WHERE `id` = ?');
        $sql->bind_param('ii',$quantity, $productId);
        return parent::select($sql);
    }
}

