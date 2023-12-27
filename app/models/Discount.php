<?php
class Discount extends Database 
{
    
    //Get percent discount
    public function getPercentDiscounts($totalOrder)
    {
        $sql = parent::$connection->prepare('SELECT * FROM `discounts` WHERE ? >= `accumulation` ORDER BY `percentage` DESC');
        $sql->bind_param('d',$totalOrder);
        return parent::select($sql);
    }

}
