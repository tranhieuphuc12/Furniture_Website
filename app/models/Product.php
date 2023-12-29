<?php

class Product extends Database{
    // Lấy tổng số trang theo parameter
    public function getTotalQuantityProductByParameter($keyword, $categoryId){
        if ($keyword == '' && $categoryId == 0) {
            $sql = parent::$connection->prepare("SELECT count(*) AS `total` FROM `products`");
        } else if ($keyword != '') {
            $keyword = "%{$keyword}%";
            $sql = parent::$connection->prepare("SELECT count(*) AS `total` FROM `products`  WHERE `name` LIKE ? OR `description` LIKE ?");
            $sql->bind_param('ss',$keyword,$keyword);
        } else {
            $sql = parent::$connection->prepare("SELECT count(*) AS `total` FROM `products` WHERE `category_id` = ?");
            $sql->bind_param('i',$categoryId);          
        }
        return parent::select($sql);
    }
    // Lấy sản phẩm theo keyword or categoryID or all by page number
    public function getProductsByParameter($page, $perPage, $keyword, $categoryId)
    {
        $start = ($page - 1) * $perPage;
        if ($keyword == '' && $categoryId == 0){
            $sql = parent::$connection->prepare("SELECT products.*,categories.name AS category_name FROM `products` INNER JOIN `categories` ON products.category_id = categories.id LIMIT ?, ?");
            $sql->bind_param('ii',$start, $perPage);
        } else if ($keyword != ''){
            $keyword = "%{$keyword}%";
            $sql = parent::$connection->prepare("SELECT products.*,categories.name AS category_name FROM `products` INNER JOIN `categories` ON products.category_id = categories.id WHERE `products`.`name` LIKE ? OR `description` LIKE ? LIMIT ?, ?");
            $sql->bind_param('ssii',$keyword,$keyword,$start, $perPage);
        } else if($categoryId != 0){
            $sql = parent::$connection->prepare("SELECT products.*,categories.name AS category_name FROM `products` INNER JOIN `categories` ON products.category_id = categories.id WHERE `category_id` LIKE ? LIMIT ?, ?");
            $sql->bind_param('iii',$categoryId,$start, $perPage);
        }
        return parent::select($sql); 
    }
    // Lấy sản phẩm theo trang
    public function getProductsByPage($page, $perPage)
    {
        $start = ($page - 1) * $perPage;
        // 2. Tạo câu SQL
        $sql = parent::$connection->prepare("SELECT products.*,categories.name AS category_name FROM `products` INNER JOIN `categories` ON products.category_id = categories.id  LIMIT ?, ?");
        $sql->bind_param('ii',$start, $perPage);
        return parent::select($sql); 
    }
    
    // Lấy tổng số lượng sản phẩm
    public function getTotalQuantityProducts()
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
        return ($sql->execute());
    }
    // Lấy tổng sản phẩm
    public function getAllProducts()
    {
        // 2. Tạo câu SQL
        $sql = parent::$connection->prepare("SELECT * FROM `products`");
        return parent::select($sql);
    }

    // Lấy cac san pham duoc yeu thich
    public function getProductsFav($username)
    {
        // 2. Tạo câu SQL
        $sql = parent::$connection->prepare("SELECT id FROM `products` INNER JOIN favorite_product on products.id = favorite_product.product_id WHERE favorite_product.username = ?");
        $sql->bind_param('s',$username);
        return parent::select($sql);
    }

    //Lay chi tiet san pham
    public function getProductByIdProduct($productId)
    {
        // 2. Tạo câu SQL
        $sql = parent::$connection->prepare("SELECT `products`.*, categories.name AS category_name FROM `products` INNER JOIN `categories`ON `products`.`category_id` =`categories`.id WHERE `products`.`id` = ?");
        $sql->bind_param('i', $productId);
        return parent::select($sql)[0];
    }

    public function store($name, $quantity, $price, $description, $origin, $image, $categoryId )
    {
        // Nếu giảm số lượng thì truyền $quantity là biến có giá trị âm và ngược lại
        $sql = parent::$connection->prepare('INSERT INTO `products`(`name`, `quantity`, `price`, `description`, `origin`, `image`, `category_id`) VALUES (?,?,?,?,?,?,?)');
        $sql->bind_param('sidsssi',$name,$quantity,$price, $description,$origin,$image,$categoryId);
        return ($sql->execute());
    }

    public function updateNoImage($id, $name, $quantity, $price, $description, $origin, $categoryId )
    {
        $sql = parent::$connection->prepare('UPDATE `products` SET `name`= ?, `quantity` = ?, `price`=?, `description`=?, `origin`=?, `category_id`=? WHERE `id` = ?');
        $sql->bind_param('sidssii',$name,$quantity,$price, $description,$origin,$categoryId, $id);
        return ($sql->execute());
    }

    public function updateAll($id, $name, $quantity, $price, $description, $origin, $image, $categoryId )
    {
        $sql = parent::$connection->prepare('UPDATE `products` SET `name`= ?, `quantity` = ?, `price`=?, `description`=?, `origin`=?, `image`=?,`category_id`=? WHERE `id` = ?');
        $sql->bind_param('sidsssii',$name,$quantity,$price, $description,$origin,$image,$categoryId, $id);
        return ($sql->execute());
    }
}


