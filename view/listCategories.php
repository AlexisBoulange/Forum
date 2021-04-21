<?php
$nb = $data['nb'];
var_dump($data['nb']);
var_dump($data['categories']);
var_dump($data['topics'])
?>

<h1>Il y a <?= count($data['categories']);?> catégories</h1>

<?php
    foreach($data['categories'] as $category){
        $name = $category->getName();
        $id = $category->getId();
        $nb = $category->getNb();
?>

    <article class="lists">
        <a class="topic" href="?ctrl=category&method=listTopicsByCategory&id=<?=$id?>"><?= $name ?></a> <span><?=$nb;?></span>
    </article>
    <?php
}?>