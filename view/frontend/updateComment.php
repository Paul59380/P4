<?php
ob_start();
include('sectionComment.php');
?>

<fieldset id="reported_comment">
    <legend>De : <strong style="color:red"><?= $test->getOriginalComment()->getUser()->getPseudo() ?> </strong>
        Signalé le : <strong><?= $test->getReportingDate() ?></legend><br/></strong>
    <p id="descriptComment">
        <?= $test->getOriginalComment()->getUser()->getPseudo() ?> <br/>
        <?= $test->getReportingDate() ?>
    </p>
    <p id="containsComment"><?= $test->getReportedContent() ?> </p>
</fieldset>

<div style="margin-top: 80px" id="identifyAccount">
    <form action="updateContentComment.php?id=<?= $test->getId() ?>
    &idOrigin=<?= $test->getOriginalComment()->getId() ?>" method="post">
        <textarea style="height: 180px; width: 20%" name="textUpdate"><?= $test->getReportedContent() ?></textarea> <br/>
        <input style="margin-bottom: 50px;" type="submit" name="update" value="Modifier le contenu">
    </form>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
