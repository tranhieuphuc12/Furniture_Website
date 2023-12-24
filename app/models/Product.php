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
    
    // Lấy tổng số lượng sản phẩm
    public function getTotalQuantityProducts()
    {
        // 2. Tạo câu SQL
        $sql = parent::$connection->prepare("SELECT COUNT(*) AS total FROM `products`");
        return parent::select($sql)[0]['total'];
    }

    // Lấy tổng sản phẩm
    public function getAllProducts()
    {
        // 2. Tạo câu SQL
        $sql = parent::$connection->prepare("SELECT * FROM `products`");
        return parent::select($sql);
    }
}