<?php
class Member extends Database{
    function store ($username,$password,$phoneNumber){
        $sql = parent::$connection->prepare("INSERT INTO `members`(`username`, `password`,`phone_number`) VALUES (?,?,?)");
        $sql->bind_param('sss',$username,$password,$phoneNumber);        
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

    function getToken($username){
        $sql =parent::$connection->prepare('SELECT `token` FROM `members` WHERE `username` like ?');
        $sql->bind_param('s',$username);
        $token = parent::select($sql)[0]['token'];
        return $token;
    }

    function uploadFile($fileContent,$username) {
        $sql =parent::$connection->prepare("UPDATE `members` SET `avatar`= ? WHERE `username`like ?");
        $sql->bind_param('bs',$fileContent,$username);
        
        
        return $sql->execute();
    }

    function getMember($username){
        $sql = parent::$connection->prepare('SELECT * FROM `members` WHERE `username` like ?');
        $sql->bind_param('s',$username);
        return $userInfo = parent::select($sql)[0];
        
    }
}