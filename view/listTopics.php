<h1>Il y a <?= count($data['topics']);?> topics </h1>


<?php
foreach($data['topics'] as $topic){
    ?>
    <article class="lists row align-content-md-center align-items-center">
        <a class="mr-auto p-2 topic justify-content-center" href="?ctrl=topic&method=listMessagesByTopic&id=<?= $topic->getId() ?>"><?= $topic->getTitle() ?></a>
        <a class="btn btn-success" href="#"> Modifier</a>
        <a class="btn btn-danger" href="#"> Supprimer</a>
    </article>
    <?php
}?>
    