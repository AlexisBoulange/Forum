<?php

namespace Controller;

use Model\Manager\UserManager;

class UserController {


    public function usersList(){

        $userModel = new UserManager;
        $users = $userModel->findAll();

        return [
            "view" => "user/listUsers.php",
            "data" => [
                "users" => $users,
            ]
        ];
    }
    
}