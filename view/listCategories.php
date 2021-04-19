<h1>Liste des catégories</h1>

<ul>
<?php
foreach($data['categories'] as $category){
    ?>
    <li><?php $name = $category->getName();
        $id = $category->getId();?>
    
    <a href="?ctrl=category&method=listTopicsByCategory&id=<?=$id?>"><?= $name ?></a> 
    </li>


<?php
}?></ul>