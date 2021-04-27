<?php

namespace Controller;

use App\AbstractManager;
use Model\Manager\TopicManager;
use Model\Manager\MessageManager;
use Model\Manager\CategoryManager;


class TopicController
{

    public function topicsList()
    {

        $topicModel = new TopicManager;
        $topics = $topicModel->findAll();

        return [
            "view" => "topic/listTopics.php",
            "data" => [
                "topics" => $topics,
            ]
        ];;
    }

    public function listMessagesByTopic()
    {

        $id = (isset($_GET['id'])) ? $_GET['id'] : null; // On récupère l'id 

        //Je met mes classes dans des var que j'appellerai ensuite
        $messageModel = new MessageManager;
        $topicModel = new TopicManager;

        //J'utilise la méthode findOneById() de TopicManager
        $topics = $topicModel->findOneById($id);
        //J'utilise la méthode findTopicsByCategory() de MessageManager
        $messages = $messageModel->findMessagesByTopic($id);


        return [
            "view" => "topic/listMessagesByTopic.php",
            "data" => [
                "topics" => $topics,
                "messages" => $messages,
            ]
        ];;
    }

    public function createTopic()
    {

        if(\App\Session::getUser()){
            //On vérifie si tous les champs sont remplis
            if (!empty($_POST['title'])) {

                $userId = $_SESSION['user']->getId();

                //on applique un filter input pour se prémunir des failles XCSS
                $topic = filter_input(INPUT_POST, "title", FILTER_SANITIZE_STRING);
                $categoryId = filter_input(INPUT_POST, "categoryId", FILTER_SANITIZE_STRING);
                // $userId = filter_input(INPUT_POST, "userId", FILTER_SANITIZE_STRING);
                $text = filter_input(INPUT_POST, "text", FILTER_SANITIZE_STRING);

                $topicModel = new TopicManager;
                $messageModel = new MessageManager;
                

                if (!$topicModel->findOneByName($topic)) {
                    $topicAdd = $topicModel->addTopic($topic, $categoryId, $userId);
                    $messageModel->addMessage($text, $userId, $topicAdd['id_topic']);

                    header("Location: ?ctrl=topic&method=topicsList");
                } else {
                    var_dump("Le sujet existe déjà");
                }
            }
        }
        return [
            "view" => "topic/createTopic.php",
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

    public function deleteTopic(){

        $id = (isset($_GET['id'])) ? $_GET['id'] : null; // On récupère l'id 
        $topicModel = new TopicManager;
        
        $topicModel->deleteOneById($id);

        return [
            "view" => "topic/deleteTopic.php",
            "data" => [
                null,
            ]
        ];;
    }

}
