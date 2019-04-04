<?php
ob_start();
include('sectionComment.php');
?>

<?php
foreach ($commentSigned as $comment) {
    ?>
    <fieldset id="reported_comment">
        <legend>De : <strong style="color:red"><?= htmlspecialchars($comment->getUser()->getPseudo()) ?> </strong>
            Posté le : <strong><?= htmlspecialchars($comment->getReportingDate()) ?></legend>
        <br/></strong>
        <p id="descriptComment">
            <?= htmlspecialchars($comment->getUser()->getPseudo()) ?> <br/>
            <?= $comment->getReportingDate() ?>
        </p>
        <p id="containsComment"><?= htmlspecialchars($comment->getReportedContent()) ?> </p>
        <a href="index.php?action=updateComment&id=<?= $comment->getId() ?>">
            <i style="color: #288ba3; padding-left: 10px" class="fas fa-pen-fancy"></i></a>
        <a href="index.php?action=deleteComment&id=<?= $comment->getId() ?>&origin=<?= htmlspecialchars($comment->getIdComment()) ?>">
            <i style="color: red; padding-left: 10px" class="fas fa-times-circle fa-1x"></i></a>
        <a href="index.php?action=validComment&id=<?= $comment->getId() ?>">
            <i style="color: #01991f; padding-left: 10px" class="far fa-check-circle"></i></a>
    </fieldset>
    <?php
}
?>


<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>


