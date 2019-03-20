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
<?php
foreach ($news as $new) {
    ?>

    <div id="listNews">
        <div class="news">

            <h2><?= htmlspecialchars($new->getTitleNews()) ?> <br/>
                <span> mis en ligne le : <?= htmlspecialchars($new->getDateCreate()) ?> </span>
            </h2>

            <p id="contains_news">
                <?= htmlspecialchars($new->getContainsNews()) ?>
            </p>
            <p id="getComments">
                <button><a href="getComments.php?news=<?= $new->getId() ?>" >Accès aux commentaires</a></button>
            </p>
        </div>
    </div>


    <?php
}
    ?>

</body>
</html>