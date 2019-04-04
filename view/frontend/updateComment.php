<?php
ob_start();
include('sectionComment.php');
?>

<fieldset id="reported_comment">
    <legend>De : <strong style="color:red"><?= htmlspecialchars($reportedComment->getOriginalComment()->getUser()->getPseudo()) ?> </strong>
        Signalé le : <strong><?= $reportedComment->getReportingDate() ?></legend>
    <br/></strong>
    <p id="descriptComment">
        <?= htmlspecialchars($reportedComment->getOriginalComment()->getUser()->getPseudo()) ?> <br/>
        <?= $reportedComment->getReportingDate() ?>
    </p>
    <p id="containsComment"><?= htmlspecialchars($reportedComment->getReportedContent()) ?> </p>
</fieldset>

<div style="margin-top: 80px" id="identifyAccount">
    <form action="index.php?action=updateContentComment&id=<?= $reportedComment->getId() ?>
    &idOrigin=<?= $reportedComment->getOriginalComment()->getId() ?>" method="post">
        <textarea style="height: 180px; width: 20%" name="textUpdate"><?= htmlspecialchars($reportedComment->getReportedContent()) ?></textarea>
        <br/>
        <input style="margin-bottom: 50px;" type="submit" name="update" value="Modifier le contenu">
    </form>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
