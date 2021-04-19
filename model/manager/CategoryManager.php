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

        $sql = "SELECT * FROM category";            //On SELECT tous les éléments de la table category

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
}