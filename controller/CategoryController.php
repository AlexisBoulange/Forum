<?php

namespace Controller;

use Model\Manager\CategoryManager;
use Model\Manager\TopicManager;

class CategoryController {


    public function categoriesList(){

        $categoryModel = new CategoryManager;

        $categories = $categoryModel->findAll();



        return [
            "view" => "listCategories.php",
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
            "view" => "listTopicsByCategory.php",
            "data" => [
                "categories" => $categories,
                "topics" => $topics,
            ]
        ];;
    }
}