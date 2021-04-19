<?php

namespace Model\Manager;

use App\AbstractManager;

class TopicManager extends AbstractManager
{

    private static $classname = "Model\Entity\Topic"; //Fully qualified classname


    public function __construct(){
        self::connect(self::$classname);
    }
    





    public function findAll(){                      //fonction pour trouver toutes les catégories

        $sql = "SELECT * FROM topic";               //On SELECT tout les éléments de la table category

        return self::getResults(
            self::select($sql, null, true), 
            self::$classname
        );
    }

    public function findOneById($id){
        $sql = "SELECT *
                FROM category
                WHERE category_id = :id";

        return self::getOneOrNullResult(
            self::select($sql,
                        ["id" =>$id],
                        true),
        self::$classname
        );
    }

    public function findTopicsByCategory($id){

        $sql = "SELECT t.id_topic, t.title, t.creationDate, t.user_id, u.username
                FROM topic t INNER JOIN user u
                ON t.user_id = u.id_user
                WHERE t.category_id = :id
                ORDER BY t.creationDate DESC";

        return self::getResults(
            self::select($sql,
            ["id" => $id],
            true),
            self::$classname
        );
    }
}