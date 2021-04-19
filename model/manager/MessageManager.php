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
            self::select($sql, null, true), 
            self::$classname
        );
    }
}