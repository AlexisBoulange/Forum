<?php

$category = $data['categories'];

?>



<h1>Liste des sujets</h1>


<?php
foreach($data['topics'] as $topic){
    ?>
    <article class="lists">
    <p><a class="topic" href="?ctrl=topic&method=listPostsByTopic&id=><?= $topic->getId() ?>"><?= $topic->getTitle() ?></a></p>
    <p class="date"><?= $topic->getCreationDate() ?></p>
    <p class="author">Créé par : <a class="user" href="?ctrl=user&method=infoUser&id=<?= $topic->getUser()->getId() ?>"><?= $topic->getUser()->getUsername() ?></a></p>
    </article>
    <?php
}?>

