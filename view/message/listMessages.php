<h1>Liste des messages</h1>


<?php
foreach($data['messages'] as $message){
    ?> 
    <?= $message->getId() ;
        $message->getText(); ?>
    <?php
}?>
    