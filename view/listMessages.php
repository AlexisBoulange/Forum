<h1>Liste des messages</h1>

<ul>
<?php
foreach($data['messages'] as $message){
    ?>
    <li><?= $message->getText() ?></li>
    <?php
}?>
    
</ul>