<?php

namespace Controller;

use Model\Manager\MessageManager;
use Model\Manager\TopicManager;

class MessageController {

    public function messagesList(){

    $messageModel = new MessageManager;
        $messages = $messageModel->findAll();

        return [
            "view" => "message/listMessages.php",
            "data" => [
                "messages" => $messages,
            ]
        ];;
    }


    public function replyMessage()
    {

        if(\App\Session::getUser()){
            //On vérifie si tous les champs sont remplis
            $id = (isset($_GET['id'])) ? $_GET['id'] : null; // On récupère l'id 
            if (!empty($_POST['text'])) {

                $userId = $_SESSION['user']->getId();

                //on applique un filter input pour se prémunir des failles XCSS
                // $categoryId = filter_input(INPUT_POST, "categoryId", FILTER_SANITIZE_STRING);
                // $userId = filter_input(INPUT_POST, "userId", FILTER_SANITIZE_STRING);
                $text = filter_input(INPUT_POST, "text", FILTER_SANITIZE_STRING);

                $messageModel = new MessageManager;


                    $messageModel->addMessage($text, $userId, $id);

                    header("Location: ?ctrl=topic&method=topicsList");
            }
        }
        return [
            "view" => "message/replyMessage.php",
            "data" => ['id'=>$id]
        ];
    }
}