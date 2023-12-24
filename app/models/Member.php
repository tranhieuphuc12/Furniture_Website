<?php
class Member extends Database{
    function store ($username,$password){
        $sql = parent::$connection->prepare("INSERT INTO `members`(`username`, `password`) VALUES (?,?)");
        $sql->bind_param('ss',$username,$password);

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

}