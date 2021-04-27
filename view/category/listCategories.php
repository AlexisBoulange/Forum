<?php


?>

<h1>Il y a <?= count($data['categories']);?> catégories</h1>

<?php
    foreach($data['categories'] as $category){
        $name = $category->getName();
        $id = $category->getId();
        $nb = $category->getNb();
?>

    <article class="lists d-flex p-2 ">
        <a class="topic" href="?ctrl=category&method=listTopicsByCategory&id=<?=$id?>"><?= $name ?></a>
        <p class="nbTopics align-self-center"> Topics : <?=$nb?> </p>
        <a class="btn btn-danger align-self-center" href="?ctrl=category&method=deleteCategory&id=<?= $id ?>"> Supprimer</a>
    </article>
    <?php
}?>
<a class="btn btn-primary " href="?ctrl=category&method=createCategory"> Créer une nouvelle catégorie</a>