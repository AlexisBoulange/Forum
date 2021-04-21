<h1>Il y a <?= count($data['users']);?> utilisateurs </h1>

<ul>
<?php
foreach($data['users'] as $user){
    ?>
    <li><?= $user->getUsername() ?></li>
    <?php
}?>
    
</ul>