<h1>Liste des topics</h1>

<ul>
<?php
foreach($data['topics'] as $topic){
    ?>
    <article class="lists">
        <p><?= $topic->getTitle() ?> <a class="btn btn-dark" href="#"> Modifier</a><a class="btn btn-danger" href="#"> Supprimer</a></p>
    </article>
    <?php
}?>
    
</ul>