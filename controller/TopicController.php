<?php

namespace Controller;

use Model\Manager\TopicManager;

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
}