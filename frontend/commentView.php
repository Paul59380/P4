<!DOCTYPE html>

<html lang="en">
<meta charset="UTF-8">


<head>
    <title>Location Vélo</title>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport">
    <meta content="Carte de location de vélo interavtive" name="description"/>
    <link href="design.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.0/css/all.css" integrity="sha384-Mmxa0mLqhmOeaE8vgOSbKacftZcsNYDjQzuCOm6D02luYSzBG8vpaOykv9lFQ51Y" crossorigin="anonymous">
</head>

<body>
<?php include('section.php') ?>
<br/>
    <a class="returnIndex" href="index.php">Retour à la liste de news</a>

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