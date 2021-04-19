<?php

namespace Controller;

use Model\Manager\MessageManager;

class MessageController {

    public function messagesList(){

    $messageModel = new MessageManager;
        $messages = $messageModel->findAll();

        return [
            "view" => "listMessages.php",
            "data" => [
                "messages" => $messages,
            ]
        ];;
    }
}