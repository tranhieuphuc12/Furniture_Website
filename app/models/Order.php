<?php
class Order extends Database 
{
     /*Tìm order_id của username nếu status = 0
    Nếu ko có thì tạo mới
    Sau đó tìm order_id , thêm sản phẩm vào order*/
    
    /* XỬ LÝ ADD TO CART */
    //Find Order_Id = 0 of Username at table orders
    public function getOrderIds($username, $status)
    {
        //Find order_id by username and status
        $sql = parent::$connection->prepare('SELECT `order_id` FROM `orders` WHERE `username` = ? AND `status` = ?');
        $sql->bind_param('si',$username,$status);
        return parent::select($sql);
    }

    //Create at table orders when username don't have order with status 0
    public function storeOrder($username)
    {
        $sql = parent::$connection->prepare('INSERT INTO `orders`( `username`) VALUES (?)');
        $sql->bind_param('s',$username);
        return($sql->execute());
    }

    //Add product into table order_product 
    public function storeProductIntoOrder($orderId,$productId,$price, $quatity)
    {
        $sql = parent::$connection->prepare('INSERT INTO `order_product`(`order_id`, `product_id`, `price`, `quantity`) VALUES (?,?,?,?)');
        $sql->bind_param('iidi',$orderId,$productId,$price, $quatity);
        return($sql->execute());
    }

    //Kiem tra san pham co trong don hang
    public function checkExist($orderId, $productId)
    {
        //Find order_id by username and status
        $sql = parent::$connection->prepare('SELECT * FROM `order_product` WHERE `order_id` = ? AND `product_id` = ?');
        $sql->bind_param('ii',$orderId,$productId);
        return parent::select($sql);
    }

    //Neu da ton tai trong don hang thi update so luong
    public function updateQuantityProductInOrder( $orderID, $productId, $quantity)
    {
        //Find order_id by username and status
        $sql = parent::$connection->prepare('UPDATE `order_product` SET `quantity`=`quantity`+ ? WHERE `order_id` = ? AND `product_id`=?');
        $sql->bind_param('iii',$quantity, $orderID,$productId);
        return ($sql->execute());
    }
    /* 
        Tại màn hình xem giỏ hàng:
        - Hiển thị Tên sản phẩm, hình ảnh, số lượng(**), giá 1 sản phẩm, tổng tiền của 1 sản phẩm
        - Dòng cuối cùng hiển thị tổng đơn hàng
        - 1 text Giá giá sẽ hiện % được giảm giá nếu giá đơn hàng đạt được đủ yêu cầu
        - Nếu đơn hàng tích lũy đủ với chính sách của cửa hàng thì sẽ được update lên role Premium
        - Nếu tài khoản là Premium thì với đơn hàng có giá trị bất kì sẽ đều được giảm giá 
            với mức giảm giá thấp nhẩt của cửa hàng, nếu giá trị đơn hàng đạt được mức giảm giá 
            cao hơn so với mức giảm của Premium thì sẽ áp dụng mức giảm giá cao hơn.

        (**) Nếu số lượng trong giỏ hàng bé hơn số lượng tồn kho của sản phẩm đó, ngược lại sản phẩm tự động xóa
    */

    //Get total order with status 0
    

   

    /* XỬ LÝ ĐẶT HÀNG */

    /*
        Khi nhấn nút đặt hàng thì tức là username đang có 1 orderID với status = 0
        - Đi tìm orderId (done)
        - Lấy danh sách các productID (done)
        - Lấy danh sách số lượng giảm đi tương ứng với productID (done)
        - Truy cập vào bảng Product giảm số lượng hàng tồn kho tương ứng với productID và quantity(done)
        - Chuyển status của orderID là 1   (done)
        - Cập nhật cột hóa đơn tích lũy tại bảng account(done)
    */

    //Get all productId by username with orderID
    public function getProductIds( $orderID)
    {
        //Find order_id by username and status
        $sql = parent::$connection->prepare('SELECT `product_id` FROM `order_product` WHERE `order_id` = ? ');
        $sql->bind_param('i',$orderID);
        return parent::select($sql);
    }

    public function getProductByUsernameStatus( $username, $status)
    {
        //Find order_id by username and status
        $sql = parent::$connection->prepare('SELECT products.*
        FROM products INNER JOIN order_product On products.id = order_product.product_id INNER JOIN orders ON order_product.order_id = orders.order_id WHERE orders.username = ? AND status = ? ');
        $sql->bind_param('si',$username, $status);
        return parent::select($sql);
    }

    public function getProductToCart( $username, $status)
    {
        //Find order_id by username and status
        $sql = parent::$connection->prepare('SELECT products.quantity as quantityProduct,products.id ,products.name, products.image, products.price, order_product.quantity
        FROM products INNER JOIN order_product On products.id = order_product.product_id INNER JOIN orders ON order_product.order_id = orders.order_id WHERE orders.username = ? AND status = ?');
        $sql->bind_param('si',$username, $status);
        return parent::select($sql);
    }

    public function destroyProductInCart($username, $productId)
    {
        $sql = parent::$connection->prepare('DELETE order_product FROM order_product INNER JOIN orders On order_product.order_id = orders.order_id WHERE orders.username = ? AND status = 0 AND order_product.product_id = ?');
        $sql->bind_param('si',$username,$productId);
        return $sql->execute();
    }

    public function getQuantity( $orderID)
    {
        //Find order_id by username and status
        $sql = parent::$connection->prepare('SELECT `quantity` FROM `order_product` WHERE `order_id` = ? ');
        $sql->bind_param('i',$orderID);
        return parent::select($sql);
    }

    public function sumQuantity( $orderID)
    {
        //Find order_id by username and status
        $sql = parent::$connection->prepare('SELECT SUM(`quantity`) as totalQuantity FROM `order_product` WHERE `order_id` = ? ');
        $sql->bind_param('i',$orderID);
        return parent::select($sql);
    }
    public function updateStatus( $orderID, $status)
    {
        //Find order_id by username and status
        $sql = parent::$connection->prepare('UPDATE `orders` SET `status`=? WHERE `order_id` = ?');
        $sql->bind_param('ii',$status, $orderID);
        return $sql->execute();
    }

    // Get all order
    public function getAllOrdersAsc($status)
    {
        //Find order_id by username and status
        $sql = parent::$connection->prepare('SELECT * 
                                            FROM `orders` INNER JOIN `status`
                                            ON orders.status = status.id
                                            WHERE `status`> ? ORDER BY `status`ASC');
        $sql->bind_param('i',$status);
        return parent::select($sql);
    }

    public function getProductsByOrderId( $orderID)
    {
        //Find order_id by username and status
        $sql = parent::$connection->prepare('SELECT order_product.*, products.name, products.image
                                            FROM `order_product` INNER JOIN products 
                                            ON order_product.product_id = products.id 
                                            WHERE `order_id` = ? ');
        $sql->bind_param('i',$orderID);
        return parent::select($sql);
    }

    public function getAllOrderByStatusForOrderManagement($status)
    {
        //Find order_id by username and status
        $sql = parent::$connection->prepare('SELECT order_product.order_id , orders.username, members.phone, status.id, status.status_name, products.name, order_product.price, order_product.quantity, products.image 
                                            FROM `orders` INNER JOIN `status`ON orders.status = status.id
                                            INNER JOIN `order_product`ON orders.order_id = order_product.order_id
                                            INNER JOIN `products` ON products.id = order_product.product_id
                                            INNER JOIN `members` ON members.username LIKE orders.username  
                                            WHERE status.id > ?
                                            ORDER BY `status`.`id` ASC');
        $sql->bind_param('i',$status);
        return parent::select($sql);
    }

 
}
