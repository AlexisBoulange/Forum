<?php

$category = $data['categories'];

?>


<h1>Il y a <?=count($data['topics']);?> sujets dans la catégorie <?=$category->getName();?></h1>


<?php
foreach($data['topics'] as $topic){
    ?>
    <article class="lists">
        <a class="topic" href="?ctrl=topic&method=listMessagesByTopic&id=<?= $topic->getId() ?>"><?= $topic->getTitle() ?></a>
        <p class="date"><?= $topic->getCreationDate() ?></p>
        <p class="author">Créé par : <a class="user" href="?ctrl=topic&method=infoUser&id=<?= $topic->getUser()->getId() ?>"><?= $topic->getUser()->getUsername() ?></a></p>
    </article>
    <?php
}?>

<a class="btn btn-primary" href="?ctrl=topic&method=createTopic&id=<?= $topic->getId() ?>"> Créer un nouveau sujet</a>