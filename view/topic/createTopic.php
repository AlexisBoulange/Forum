<h1>Créer un sujet</h1>

<form action="?ctrl=topic&method=createTopic" method="post">
    <div class="form-group">
        <label for="title">Titre</label>
        <input type="text" class="form-control" name="title" id="Titre">
    </div>
    <div class="form-group">
            <label for="category">Catégorie :</label>
            <select name="categoryId" id="category_id">

            <?php 
                foreach($data['categories'] as $category){
                    $name = $category->getName();
                    $id = $category->getId();
                    echo "<option value='" . $id . "'>" . $name . "</option>";
                }?>
            </select>
    </div>
    <div class="form-group">
        <label for="text">Message</label>
        <textarea class="form-control" name="text" id="text" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Valider</button>
</form>