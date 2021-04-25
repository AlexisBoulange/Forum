<?php

namespace Model\Manager;

use App\AbstractManager;

class CategoryManager extends AbstractManager
{

    private static $classname = "Model\Entity\Category"; //Fully qualified classname


    public function __construct(){
        self::connect(self::$classname);
    }
    



    public function findAll(){                      //fonction pour trouver toutes les catégories

        $sql = "SELECT name, id_category, COUNT(t.id_topic) AS nb
                FROM category c LEFT JOIN topic t
                ON t.category_id = c.id_category
                 GROUP BY name, id_category ";            //On SELECT tous les éléments de la table category

        return self::getResults(                    //Récupère un tableau d'objets
            self::select($sql, null, true), 
            self::$classname
        );
    }

    public function findOneById($id){
        $sql = "SELECT *
                FROM category
                WHERE id_category = :id";

        return self::getOneOrNullResult(
            self::select($sql,
                        ["id" =>$id],
                        false),
            self::$classname
        );
    }

    public function findOneByName($category){
        $sql = "SELECT name
                FROM category c
                WHERE name = :category";

        return self::getOneOrNullResult(
            self::select($sql,
                        ["category" =>$category],
                        false),
            self::$classname
        );
    }

    public function addCategory($category){
        $sql = "INSERT INTO category(name)
                VALUES (:category)";

        return self::create($sql,
                        ["category" =>$category]);
            self::$classname;
        
    }
}