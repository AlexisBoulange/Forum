<h1>Liste des utilisateurs</h1>

<ul>
<?php
foreach($data['users'] as $user){
    ?>
    <li><?= $user->getUsername() ?></li>
    <?php
}?>
    
</ul>