<?php
class Favorite extends Database 
{
    
    //Check exist
    public function checkExist($username, $productId)
    {
        $sql = parent::$connection->prepare('SELECT * FROM `favorite_product` WHERE username = ? AND product_id = ?');
        $sql->bind_param('si',$username,$productId);
        return parent::select($sql);
    }

    //Lay tat ca san pham yeu thic cua username
    public function getAllProductFav($username)
    {
        $sql = parent::$connection->prepare('SELECT * FROM `favorite_product` INNER JOIN products ON products.id = product_id WHERE username = ?');
        $sql->bind_param('s',$username);
        return parent::select($sql);
    }

    //Them yeu thich
    public function storeFavorite($username, $productId)
    {
        $sql = parent::$connection->prepare('INSERT INTO `favorite_product`(`username`, `product_id`) VALUES (?,?)');
        $sql->bind_param('si',$username,$productId);
        return($sql->execute());
    }

    //Xoa yeu thich
    public function destroyFavorite($username, $productId)
    {
        $sql = parent::$connection->prepare('DELETE FROM `favorite_product` WHERE `username` = ? AND product_id =?');
        $sql->bind_param('si',$username,$productId);
        return($sql->execute());
    }
}
