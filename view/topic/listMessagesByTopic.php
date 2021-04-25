<h1>Liste des messages</h1>


<?php
foreach($data['messages'] as $message){
    ?>
    <article class="messages">
        <div class="flex">
            <p class="message-author mr-auto">Posté par : <a class="user" href="?ctrl=user&method=infoUser&id=<?= $message->getUser()->getId() ?>"><?= $message->getUser()->getUsername() ?></a></p>
            <p class="message-date">Le : <?=$message->getCreationDate()?></p>
        </div>
        <div class="lineG"></div>
        <p class="message-content"><?= $message->getText()?></p>
    </article>
    <?php
}?>
    <a class="btn btn-success" href="?ctrl=message&method=replyMessage&id=<?= $message->getTopic()->getId()?>"> Répondre</a>