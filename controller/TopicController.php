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
            $id = (isset($_GET['id'])) ? $_GET['id'] : null; // On récupère l'id 

            //on instancie nos classes
            $topicModel = new TopicManager;
            $messageModel = new MessageManager;
            $categoryModel = new CategoryManager;

            //On récupère notre category_id
            $category = $categoryModel->findOneById($id);
            $categoryId = $category->getId();
            //On vérifie si tous les champs sont remplis
            if (!empty($_POST['title'])) {

                //on récupère l'id de notre user en session
                $userId = $_SESSION['user']->getId();

                //on applique un filter input pour se prémunir des failles XCSS
                $topic = filter_input(INPUT_POST, "title", FILTER_SANITIZE_STRING);
                $text = filter_input(INPUT_POST, "text", FILTER_SANITIZE_STRING);

                //Si aucun topic existe avec le même nom
                if (!$topicModel->findOneByName($topic)) {
                    //On récupère l'id du topic à l'aide du lastInsertId de notre Manager
                    $topicAdd = $topicModel->addTopic($topic, $categoryId, $userId);
                    //on ajoute la variable de l'id topic
                    $messageModel->addMessage($text, $userId, $topicAdd['id_topic']);
                    //on récupère notre id topic dans une variable pour pouvoir faire un redirect vers le sujet créé
                    $idTopic = $topicAdd['id_topic'];

                    header("Location: ?ctrl=topic&method=listMessagesByTopic&id=$idTopic");
                } else {
                    var_dump("Le sujet existe déjà");
                }
            }
        } else{
            var_dump("Vous n'êtes pas connecté");
        }
        return [
            "view" => "topic/createTopic.php",
            "data" => ["category"=>$category,]
        ];
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
    
    public function editTopic(){

        $id = (isset($_GET['id'])) ? $_GET['id'] : null; // On récupère l'id 

        if(\App\Session::getUser()){
            //on instancie nos classes
            $topicModel = new TopicManager;
            $messageModel = new MessageManager;

            //on applique un filter input pour se prémunir des failles XCSS
            $title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_STRING);
            $text = filter_input(INPUT_POST, "text", FILTER_SANITIZE_STRING);
            
            //on cherche nos éléments à modifier
            $topic = $topicModel->findOneById($id);
            $messages = $messageModel->findMessagesByTopic($id);

            if(!empty($_POST['title']) && ($_POST['text'])){
                //on update nos éléments à modifier
                $topicModel->updateOneById($id, $title);
                $messageModel->updateOneById($id, $text);

                //on redirige vers le topic
                header("Location: ?ctrl=topic&method=listMessagesByTopic&id=$id");
            }
        }
        return [
            "view" => "topic/editTopic.php",
            "data" => [
                'topic'=>$topic,
                'messages'=>$messages,
            ]
        ];;
    }
}
