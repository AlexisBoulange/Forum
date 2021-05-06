<?php $categoryId = $data['category'];?>

<h1>Créer un sujet</h1>

<form action="?ctrl=topic&method=createTopic&id=<?= $categoryId->getId()?>" method="post">
    <div class="form-group">
        <label for="title">Titre</label>
        <input type="text" class="form-control" name="title" id="Titre">
    </div>

    <div class="form-group">
        <label for="text">Message</label>
        <textarea class="form-control" name="text" id="text" rows="3"></textarea>
    </div>
    <p><input type="hidden" value="<?= $token?>" name="token"></p>
    <button type="submit" class="btn btn-primary">Valider</button>
</form>