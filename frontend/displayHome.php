<?php
ob_start();
include ('sectionHome.php');
?>

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
<?php $content = ob_get_clean(); ?>
<?php require ('template.php'); ?>
