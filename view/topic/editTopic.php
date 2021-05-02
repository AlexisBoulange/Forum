<?php $topic = $data['topic'];
    foreach($data['messages'] as $message){
        $topicByMessage = $message->getTopic()->getId() ;
        $messageByIdTopic = $message->getText();
    }
?>

<h1>Modifier <?= $topic->getTitle()?></h1>

<form action="?ctrl=topic&method=editTopic&id=<?= $topic->getId()?>" method="post">
    <div class="form-group">
        <label for="title">Titre</label>
        <input type="text" class="form-control" name="title" id="Titre" value="<?= $topic->getTitle()?>">
    </div>

    <div class="form-group">
        <label for="text">Message</label>
        <textarea class="form-control" name="text" id="text" rows="3" value=""><?php 
    if($topicByMessage = $topic->getId()){
        echo $messageByIdTopic;
    }?></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Valider</button>
    
</form>