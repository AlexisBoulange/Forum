<h1>Liste des messages</h1>


<?php
foreach($data['messages'] as $message){
    ?> 
    <?= var_dump($message);$message->getId() ;
        $message->getText() ?>
    <?php
}?>
    