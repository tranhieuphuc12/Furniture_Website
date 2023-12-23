<?php
class Discount extends Database 
{
    
    //Get percent discount
    public function getPercentDiscounts($totalOrder)
    {
        $sql = parent::$connection->prepare('SELECT `percentage` FROM `discounts` WHERE ? >= `accumulation`');
        $sql->blind_param('d',$totalOrder);
        return parent::select($sql);
    }

}
