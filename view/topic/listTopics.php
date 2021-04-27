<h1>Il y a <?= count($data['topics']); ?> topics </h1>

<div class="container">
    <?php
    foreach ($data['topics'] as $topic) {
    ?>
        <article class="lists row align-content-md-center align-items-center">
            <a class="mr-auto p-2 topic " href="?ctrl=topic&method=listMessagesByTopic&id=<?= $topic->getId() ?>"><?= $topic->getTitle() ?></a>
            <a class="btn btn-success" href="#"> Modifier</a>
            <a class="btn btn-danger" href="?ctrl=topic&method=deleteTopic&id=<?= $topic->getId() ?>"> Supprimer</a>
        </article>
    <?php
    } ?>

</div>
<a class="btn btn-primary" href="?ctrl=topic&method=createTopic&method=categoriesListForm"> Créer un nouveau sujet</a>