<?php
    namespace App;

    abstract class AbstractManager
    {
        private static $connection;
        //La fonction "static" nous permet d'accéder à la fonction sans instancier la classe, on peut y accéder statiquement depuis une instance d'objet
        protected static function connect(){                //Fonction pour se co à la BDD
            self::$connection = DAO::getConnection();
        }
        protected static function getLastId(){

            return self::$connection->lastInsertId();
        }

        protected static function getOneOrNullResult($row, $class){
            
            if($row != null){
                return new $class($row);
            }
            return null;
        }
        protected static function getOneOrNullResultInt($row){
            
            if($row != null){
                return $row;
            }
            return null;
        }

        protected static function getResults($rows, $class){    //fonction pour afficher les résultats d'un tableau
            
            $results = [];
            
            if($rows != null){
                foreach($rows as $row){
                    $results[] = new $class($row);
                }
            }
            return $results;
        }

                                            //CRUD

        protected static function select($sql, $params = null, $multiple = true){  //fonction SELECT
            $stmt = self::$connection->prepare($sql);
            $stmt->execute($params);

            if($multiple){
                return $stmt->fetchAll();
            }
            return $stmt->fetch();

        }

        protected static function create($sql, $params){            //fonction CREATE
            $stmt = self::$connection->prepare($sql);
            
            return $stmt->execute($params);
        }

        protected static function update($sql, $params){                        //fonction UPDATE
            $stmt = self::$connection->prepare($sql);
            return $stmt->execute($params);
        }

        protected static function delete($sql, $params){            //fonction DELETE
            $stmt = self::$connection->prepare($sql);
            
            return $stmt->execute($params);
        }

        /**
         * Get the value of connection
         */ 
        public function getConnection()
        {
                return $this->connection;
        }

    }