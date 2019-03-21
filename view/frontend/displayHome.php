<?php
ob_start();
include('sectionHome.php');
?>

<?php
foreach ($news as $new) {
    ?>

    <div id="listNews">
        <div class="news">

            <h2><em><?= htmlspecialchars($new->getTitleNews()) ?></em> <br/>
                <span> mis en ligne le : <?= htmlspecialchars($new->getDateCreate()) ?> </span>
            </h2>

            <p id="contains_news">
                <?= htmlspecialchars($new->getContainsNews()) ?>
            </p>
            <p id="getComments">
                <button><a href="getComments.php?news=<?= $new->getId() ?>" ><strong>Accès aux commentaires</strong></a></button>
            </p>
        </div>
    </div>


    <?php
}
    ?>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
