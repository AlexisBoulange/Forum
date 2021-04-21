<?php

namespace Controller;

use Model\Manager\TopicManager;
use Model\Manager\MessageManager;

class TopicController {

    public function topicsList(){

    $topicModel = new TopicManager;
        $topics = $topicModel->findAll();

        return [
            "view" => "listTopics.php",
            "data" => [
                "topics" => $topics,
            ]
        ];;
    }

    public function listMessagesByTopic(){

        $id = (isset($_GET['id'])) ? $_GET['id'] : null; // On récupère l'id 

        //Je met mes classes dans des var que j'appellerai ensuite
        $messageModel = new MessageManager;
        $topicModel = new TopicManager;
        
        //J'utilise la méthode findOneById() de TopicManager
        $topics = $topicModel->findOneById($id);
        //J'utilise la méthode findTopicsByCategory() de MessageManager
        $messages = $messageModel->findMessagesByTopic($id);


        return [
            "view" => "listMessagesByTopic.php",
            "data" => [
                "topics" => $topics,
                "messages" => $messages,
            ]
        ];;
    }
}