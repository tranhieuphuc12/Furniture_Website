<?php

class Account extends Database 
{
    //Update accumulation
    public function updateAccumlation( $username, $totalOrder)
    {
        //Find order_id by username and status
        $sql = parent::$connection->prepare('UPDATE `members` SET `accumulation`=? WHERE `username` = ?');
        $sql->bind_param('ds',$totalOrder, $username);
        return parent::select($sql);
    } 
}
