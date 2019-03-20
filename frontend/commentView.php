<!DOCTYPE html>

<html lang="en">
<meta charset="UTF-8">


<head>
    <title>Location Vélo</title>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport">
    <meta content="Carte de location de vélo interavtive" name="description"/>
    <link href="design.css" rel="stylesheet" type="text/css">
</head>

<body>


<div id="listNews">
    <div class="news">

        <h2><?= htmlspecialchars($news->getTitleNews()) ?> <br/>
            <span> mis en ligne le : <?= htmlspecialchars($news->getDateCreate()) ?> </span>
        </h2>

        <p id="contains_news">
            <?= htmlspecialchars($news->getContainsNews()) ?>
        </p>
    </div>
</div>


<?php
foreach ($comments as $comment) {
    ?>
    <div id="commentUser">
        <p id="descriptComment">
            <?= $comment->getUser()->getPseudo() ?> <br/>
            <?= $comment->getDateCreate() ?>
        </p>
        <p id="containsComment"><?= $comment->getContainsComment() ?> </p>
    </div>
    <?php
    }
?>

</body>
</html>