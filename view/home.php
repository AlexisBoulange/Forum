<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
</head>
<body>
    <h2> BIENVENUE </h2>
    <main class="flex">
        <section class="topics">
            <h4>Last topics :</h4>
            <div class="lineB"></div>
            <article class="sujet">
                <a href="#">
                    <h5>Topic 1</h5>
                </a>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Atque accusantium dignissimos aut omnis modi officia ex perferendis nihil eligendi voluptatibus cumque tempora, a labore magni, tempore quas, ducimus architecto eveniet.</p>
            </article>
            <div class="lineG"></div>
            <article class="sujet">
                <a href="#">
                    <h5>Topic 2</h5>
                </a>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Atque accusantium dignissimos aut omnis modi officia ex perferendis nihil eligendi voluptatibus cumque tempora, a labore magni, tempore quas, ducimus architecto eveniet.</p>
            </article>
            <div class="lineG"></div>
            <article class="sujet">
                <a href="#">
                    <h5>Topic 3</h5>
                </a>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Atque accusantium dignissimos aut omnis modi officia ex perferendis nihil eligendi voluptatibus cumque tempora, a labore magni, tempore quas, ducimus architecto eveniet.</p>
            </article>
        </section>
        <aside class="categories">
            <h4>Categories :</h4>
            <ul>
            <?php 
            foreach($data['categories'] as $category){
                ?>
                <li><?php 
                    $name = $category->getName();
                    $id = $category->getId();
                    ?>
                <a href="?ctrl=category&method=listTopicsByCategory&id=<?=$id?>"><?= $name ?></a>
                </li>
            <?php
            }?></ul>
        </aside>
    </main>

</body>

</html>