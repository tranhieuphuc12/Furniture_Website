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

    //Get info account
    public function getAccount( $username)
    {
        //Find order_id by username and status
        $sql = parent::$connection->prepare('SELECT * FROM `members` WHERE `username` = ?');
        $sql->bind_param('s', $username);
        return parent::select($sql);
    } 
}
