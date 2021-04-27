<?php
    namespace App;
    // On établit notre connection avec la base de donnée
    abstract class DAO
    {
        const DB_HOST = "localhost";
        const DB_NAME = "forum";
        const DB_USER = "root";
        const DB_PASS = "";

        public static function getConnection(){

            //connexion à la BDD
            try{
                $pdo = new \PDO(
                    'mysql:host='.self::DB_HOST.';dbname='.self::DB_NAME.';charset=utf8',   // "::" fournit un moyen d'accéder aux membres static ou constant, ainsi qu'aux propriétés ou méthodes surchargées d'une classe.
                    self::DB_USER,
                    self::DB_PASS,
                    [
                        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
                    ]
                );
                return $pdo;
            }
            catch(\Exception $e){                       //On catch une "exception" et on affiche un message d'erreur
                echo $e->getMessage();
                die();
            }
        }

    }