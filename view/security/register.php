<?php

?>

<h1>Enregistrez-vous</h1>

<form action="?ctrl=security&method=register" method="post">
    <div class="form-group">
        <label for="username">Identifiant</label>
        <input type="text" class="form-control" name="username" id="username" placeholder="Pseudonyme">
    </div>
    <div class="form-group">
        <label for="password">Mot de passe</label>
        <input type="password" class="form-control" name="password" id="password" placeholder="">
    </div>
    <div class="form-group">
        <label for="verifPassword">Confirmez le mot de passe</label>
        <input type="password" class="form-control" name="verifPassword" id="verifPassword" placeholder="">
    </div>
    <!-- <div class="form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
        <label class="form-check-label" for="exampleCheck1">J'ai lu et j'accepte les <a href="#">règles du forum</a></label>
    </div> -->
    <button type="submit" class="btn btn-primary">S'inscrire'</button>
</form>