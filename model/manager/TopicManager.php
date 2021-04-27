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
                FROM topic
                WHERE id_topic = :id";

        return self::getOneOrNullResult(
            self::select($sql,
                        ["id" =>$id],
                        false),
        self::$classname
        );
    }

    public function findTopicsByCategory($id){

        $sql = "SELECT t.id_topic, t.title, t.creationDate, t.user_id, u.username, COUNT(t.id_topic) AS nbTopics, t.category_id
                FROM topic t INNER JOIN user u
                ON t.user_id = u.id_user
                WHERE t.category_id = :id
                GROUP BY t.id_topic
                ORDER BY t.creationDate DESC";

        return self::getResults(
            self::select($sql,
            ["id" => $id],
            true),
            self::$classname
        );
    }

    public function findOneByName($title){
        $sql = "SELECT title
                FROM topic t
                WHERE title = :title";

        return self::getOneOrNullResult(
            self::select($sql,
                        ["title" =>$title],
                        false),
            self::$classname
        );
    }

    public function addTopic($title, $category, $user){

        $sql = "INSERT INTO topic(title, category_id, user_id)
                VALUES (:title, :categoryId, :userId)";


            self::create($sql,
                        [":title" =>$title,
                        ":categoryId"=>$category,
                        ":userId"=>$user,
                        ]);
            

            $lastId = self::getLastId();
            
            return ['user'=>$user, 'id_topic'=>$lastId];
            // $sql2 = "INSERT INTO message(text, user_id, topic_id)
            //         VALUES (:text, :userId, :topicId)";


            // return self::create($sql2,
            //                 [
            //                 "userId"=>$userId,
            //                 "topicId"=>$lastId]);
            //     self::$classname;
    }

    public function deleteOneById($id){


                $sql = "DELETE FROM message
                        WHERE topic_id = :id";

                self::delete($sql,
                ["id"=>$id]);

                $sql2 = "DELETE FROM topic
                        WHERE id_topic = :id";

                return self::delete($sql2,
                            ["id"=>$id]);
                
        }

    
}