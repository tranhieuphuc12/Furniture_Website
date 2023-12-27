<?php
class Category extends Database{
public function getAllCategories()
{
    //Find order_id by username and status
    $sql = parent::$connection->prepare('SELECT * FROM `categories`');
    return parent::select($sql);
}
}