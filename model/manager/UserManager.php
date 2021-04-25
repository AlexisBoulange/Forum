<?php

namespace Model\Manager;

use App\AbstractManager;

class UserManager extends AbstractManager
{

    private static $classname = "Model\Entity\User"; //Fully qualified classname


    public function __construct(){
        self::connect(self::$classname);
    }
    

    public function findAll(){                      //fonction pour trouver toutes les catégories

        $sql = "SELECT * FROM user";                //On SELECT tout les éléments de la table category

        return self::getResults(
            self::select($sql, null, true), 
            self::$classname
        );
    }

    public function findOneById($id){
        $sql = "SELECT *
                FROM user
                WHERE id_user = :id";

        return self::getOneOrNullResult(
            self::select($sql,
                        ["id" =>$id],
                        false),
            self::$classname
        );
    }

    public function findOneByUsername($username){
        $sql = "SELECT *
                FROM user
                WHERE username = :username";

        return self::getOneOrNullResult(
            self::select($sql,
                        ["username" =>$username],
                        false),
            self::$classname
        );
    }

    public function addUser($username, $hash){
        $sql = "INSERT INTO user(username, password)
                VALUES (:username, :password)";

        return self::create($sql,[
            "username" =>$username,
            "password" =>$hash,
        ],
            self::$classname
        );
    }
}