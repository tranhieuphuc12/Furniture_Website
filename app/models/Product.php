<?php
class Product extends Database 
{
    

    //Giảm số lượng hàng ứng với mã sản phẩm
    public function updateQuantity($productId, $quantity)
    {
        // Nếu giảm số lượng thì truyền $quantity là biến có giá trị âm và ngược lại
        $sql = parent::$connection->prepare('UPDATE `products` SET `quantity`= `quantity` + ?  WHERE `id` = ?');
        $sql->bind_param('ii',$quantity, $productId);
        return parent::select($sql);
    }
}
