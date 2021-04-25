<h1>Créer une catégorie</h1>

<form action="?ctrl=category&method=createCategory" method="post">
    <div class="form-group">
        <label for="categorie">Nom de la catégorie</label>
        <input type="text" class="form-control" name="categorie" id="name" placeholder="Ex : musique" required>
    </div>
    <button type="submit" class="btn btn-primary">Valider</button>
</form>