<?php

namespace Model\Manager;

use App\AbstractManager;

class MessageManager extends AbstractManager
{

    private static $classname = "Model\Entity\Message"; //Fully qualified classname


    public function __construct(){
        self::connect(self::$classname);
    }
    


    public function findAll(){                      //fonction pour trouver toutes les catégories

        $sql = "SELECT * FROM message";             //On SELECT tout les éléments de la table category

        return self::getResults(
            self::select($sql, null, false), 
            self::$classname
        );
    }

    public function findOneById($id){
        $sql = "SELECT *
                FROM message
                WHERE id_message = :id";

        return self::getOneOrNullResult(
            self::select($sql,
                        ["id" =>$id],
                        false),
        self::$classname
        );
    }

    public function findMessagesByTopic($id){

        $sql = "SELECT m.id_message, m.text, m.creationDate, m.topic_id, t.title
                FROM message m INNER JOIN topic t
                ON m.topic_id = t.id_topic
                WHERE t.id_topic = :id
                ORDER BY m.creationDate ASC";

        return self::getResults(
            self::select($sql,
            ["id" => $id],
            true),
            self::$classname
        );
    }
}