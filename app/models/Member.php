<?php
class Member extends Database{

    function store ($username,$password,$phoneNumber,$gender){
        $sql = parent::$connection->prepare("INSERT INTO `members`(`username`, `password`,`phone_number`,`gender`) VALUES (?,?,?,?)");
        $sql->bind_param('ssss',$username,$password,$phoneNumber,$gender);        
        return $sql->execute();
    }
    
    function login($username,$password){
        $sql = parent::$connection->prepare('SELECT members.password, roles.name
        FROM `members`
        INNER JOIN `roles`
        ON roles.id = role_id
        WHERE `username` = ?');
        $sql->bind_param('s',$username);
        $userPassword = parent::select($sql)[0]['password'];
        $userRole = parent::select($sql)[0]['name'];
        if (password_verify($password,$userPassword)) {
            return $userRole;
        }
        
    }

    function storeToken($token,$username) {
        $sql = parent::$connection->prepare("UPDATE `members` SET `token`= ? WHERE `username` like ?");
        $sql->bind_param('ss',$token,$username);
        return $sql->execute();
    }

    function getToken($token){
        $sql =parent::$connection->prepare('SELECT `token` FROM `members` WHERE `token` like ?');
        $sql->bind_param('s',$token);
        $tokenDatabase = parent::select($sql)[0]['token'];
        return $tokenDatabase;
    }
    function getUsername($token){
        $sql =parent::$connection->prepare('SELECT `username` FROM `members` WHERE `token` like ?');
        $sql->bind_param('s',$token);
        $username = parent::select($sql)[0]['username'];
        return $username;
    }

    function updateAvatarImage($fileContent,$username) {
        $sql =parent::$connection->prepare("UPDATE `members` SET `avatar`= ? WHERE `username`like ?");
        $sql->bind_param('ss',$fileContent,$username);                
        return $sql->execute();
    }
    function getAvatarImage($username) {
        $sql =parent::$connection->prepare("SELECT `avatar` FROM `members` WHERE `username` like ?");
        $sql->bind_param('s',$username);    
        $image = parent::select($sql)[0]['avatar'];   
        if ($image != null) {
            return $image;
        }         
        
    }

    function getMember($username){
        $sql = parent::$connection->prepare('SELECT * FROM `members` WHERE `username` like ?');
        $sql->bind_param('s',$username);
        return $userInfo = parent::select($sql)[0];
        
    }
    function update($username,$phoneNumber,$gender){
        $sql = parent::$connection->prepare('UPDATE `members` SET `phone_number`= ? ,`gender`= ?  WHERE `username` like ?');
        $sql ->bind_param('sss',$phoneNumber,$gender,$username);
        return $sql->execute();
    }
    function getPassword($username){
        $sql = parent::$connection->prepare('SELECT `password` FROM `members` WHERE `username`LIKE ? ');
        $sql ->bind_param('s',$username);
        $password = parent::select($sql)[0]['password'];
        return $password;
        
    }
    function updatePassword($password,$username) {
        $sql = parent::$connection->prepare('UPDATE `members` SET `password`= ?  WHERE `username` like ?');
        $sql ->bind_param('ss',$password,$username);
        return $sql->execute();
    }

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