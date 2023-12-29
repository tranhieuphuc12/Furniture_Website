<?php
class Discount extends Database 
{
    
    //Get percent discount
    public function getPercentDiscountsByTotalDESC($totalOrder)
    {
        $sql = parent::$connection->prepare('SELECT * FROM `discounts` WHERE ? >= `accumulation` ORDER BY `percentage` DESC');
        $sql->bind_param('d',$totalOrder);
        return parent::select($sql);
    }
    public function getPercentDiscountsASC()
    {
        $sql = parent::$connection->prepare('SELECT * FROM `discounts` ORDER BY `percentage` ASC');
        return parent::select($sql);
    }

}
