<?php
    namespace App;

    // Dès qu'une classe possède au moins une méthode abstraite, il faut déclarer la classe comme abstraite.
    // Une classe abstraite ne peut pas être instanciée.
    // Une méthode abstraite est déclarée, mais ne s'implémente pas dans le code.
    // En fait, elle est destinée à être héritée par d'autres classes qui l'emploieront comme cadre.

    abstract class AbstractEntity
    {
        // Création d'un hydratateur récursif : faire comprendre que la clé étrangère récupère un objet ! 
        // On accède à ses données avec son entité
        //La fonction "static" nous permet d'accéder à la fonction sans instancier la classe
        //On peut y accéder statiquement depuis une instance d'objet
        protected static function hydrate($data, $object){
            
            foreach($data as $field => $value){
                // explode scinde une chaîne de caractères en segments, ici au niveau de l'underscore
                // ex : user_id => ["user", "id"]
                $fieldArray = explode("_", $field); //['grade', 'id']
                $field = $fieldArray[0];//devient grade
                // Si l'index n°1 de $fieldArray est déclaré et non nul ET s'il vaut à "id"
                // Cas d'une clé étrangère (ex: user_id)
                if(isset($fieldArray[1]) && $fieldArray[1] === "id"){
                    //fieldArray[0] = user fieldArray[1] = user_id
                    $classname = ucfirst($fieldArray[0])."Manager"; //ucfirst met le premier char en majuscule
                    // On récupère Model\Manager\TopicManager
                    $FKCName = "Model\\Manager".DS.$classname;
                    $manager = new $FKCName();
                    $value = $manager->findOneById($value);//devient un objet Grade
                }
                
                $method = "set".ucfirst($field);
                if(method_exists($object, $method)){
                    $object->$method($value);
                }
            }
        }
    }