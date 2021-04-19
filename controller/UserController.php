<?php

namespace Controller;

use Model\Manager\UserManager;

class UserController {

    public function login(){

        //traitement à faire

        return [
            "view" => "login.php",
            "data" => null
        ];
    }

    public function usersList(){

        $userModel = new UserManager;
        $users = $userModel->findAll();

        return [
            "view" => "listUsers.php",
            "data" => [
                "users" => $users,
            ]
        ];
    }
    
}