

<form action="?ctrl=message&method=replyMessage&id=<?= $data['id']?>" method="post">

    <div class="form-group">
        <label for="text">Example textarea</label>
        <textarea class="form-control" name="text" id="text" rows="3"></textarea>
    </div>
    <p><input type="hidden" value="<?= $token?>" name="token"></p>
<button type="submit" class="btn btn-primary">Valider</button>

</form>