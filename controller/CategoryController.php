<?php

namespace Controller;

use Model\Manager\CategoryManager;
use Model\Manager\TopicManager;

class CategoryController {


    public function categoriesList(){

        $categoryModel = new CategoryManager;

        $categories = $categoryModel->findAll();

        return [
            "view" => "category/listCategories.php",
            "data" => [
                "categories" => $categories,
            ]
        ];;
    }

    public function listTopicsByCategory(){

        $id = (isset($_GET['id'])) ? $_GET['id'] : null; // On récupère l'id 

        //Je met mes classes dans des var que j'appellerai ensuite
        $categoryModel = new CategoryManager;
        $topicModel = new TopicManager;
        
        //J'utilise la méthode findOneById() de CategoryManager
        $categories = $categoryModel->findOneById($id);
        //J'utilise la méthode findTopicsByCategory() de TopicManager
        $topics = $topicModel->findTopicsByCategory($id);
        

        return [
            "view" => "category/listTopicsByCategory.php",
            "data" => [
                "categories" => $categories,
                "topics" => $topics,
                
            ]
        ];;
    }

    public function createCategory(){

        //on vérifie si la donnée entrée est vide
        if(!empty($_POST['categorie'])){

            //on applique un filter input pour se prémunir des failles XCSS
            $category = filter_input(INPUT_POST, "categorie", FILTER_SANITIZE_STRING);

            $model = new CategoryManager(); 

            //on vérifie que le nom de la catégorie n'existe pas, puis on l'ajoute avant redirigé vers la liste
            if(!$model->findOneByName($category)){
                $model->addCategory($category);

                header("Location: ?ctrl=category&method=categoriesList");
            }else {
                //sinon on met un message d'erreur
                var_dump("La catégorie existe déjà");
            }
        }

        return [
            "view" => "category/createCategory.php",
            "data" => null
        ];
    }

    public function categoriesListForm(){

        $categoryModel = new CategoryManager;

        $categories = $categoryModel->findAll();

        return [
            "view" => "topic/createTopic.php",
            "data" => [
                "categories" => $categories,
            ]
        ];;
    }
    public function deleteCategory(){

        $id = (isset($_GET['id'])) ? $_GET['id'] : null; // On récupère l'id 
        $categoryModel = new CategoryManager;
        
        $categoryModel->deleteOneById($id);

        return [
            "view" => "category/deleteCategory.php",
            "data" => [
                null,
            ]
        ];;
    }

}