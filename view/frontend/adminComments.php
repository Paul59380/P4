<?php
ob_start();
include('sectionComment.php');
?>

<?php
foreach ($commentSigned as $comment) {
    ?>
    <fieldset id="reported_comment">
        <legend>De : <strong style="color:red"><?= $comment->getUser()->getPseudo() ?> </strong>
        Signalé le : <strong><?= $comment->getReportingDate() ?></legend><br/></strong>
        <p id="descriptComment">
            <?= $comment->getUser()->getPseudo() ?> <br/>
            <?= $comment->getReportingDate() ?>
        </p>
        <p id="containsComment"><?= $comment->getReportedContent() ?> </p>
        <a href="updateComment.php?id=<?= $comment->getId() ?>">Modifier</a>
        <a href="deleteComment.php?id=<?= $comment->getId() ?>&origin=<?= $comment->getIdComment() ?>">Supprimer</a>
    </fieldset>
    <?php
}
?>


<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>


