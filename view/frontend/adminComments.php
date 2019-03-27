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
        <a href="updateComment.php?id=<?= $comment->getId() ?>">
            <i style="color: green; padding-left: 10px" class="fas fa-pen-fancy"></i></a>
        <a href="deleteComment.php?id=<?= $comment->getId() ?>&origin=<?= $comment->getIdComment() ?>">
            <i style="color: red; padding-left: 10px" class="fas fa-times-circle fa-1x"></i></a>
    </fieldset>
    <?php
}
?>


<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>


