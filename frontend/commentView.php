<?php
ob_start();
include('sectionComment.php')
?>
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

<?php $content = ob_get_clean(); ?>
<?php require ('template.php'); ?>
