<?php


?>

<h1>Il y a <?= count($data['categories']);?> catégories</h1>

<?php
    foreach($data['categories'] as $category){
        $name = $category->getName();
        $id = $category->getId();
        $nb = $category->getNb();
?>

    <article class="lists flex">
        <a class="topic" href="?ctrl=category&method=listTopicsByCategory&id=<?=$id?>"><?= $name ?></a>
        <p> <?=$nb;?> </p>
    </article>
    <?php
}?>
<a class="btn btn-success" href="?ctrl=category&method=createCategory"> Créer une nouvelle catégorie</a>