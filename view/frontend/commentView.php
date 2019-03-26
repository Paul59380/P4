<?php
session_start();
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

            <a href="signedComment.php?news=<?= $news->getId() ?>&comment=<?= $comment->getId() ?>">Signaler</a>

        <?php
        ?>
    </div>
    <?php
}
?>
<?php if (isset($_SESSION['name'])) {
    ?>
    <footer>
        <div id="footerRight">
            <form action="addComment.php?id=<?= $news->getId() ?>&idUser=<?= $_SESSION['id'] ?>" method="post">
                <label><strong>Pseudo :</strong><br/>
                    <input type="text" name="pseudoComment" value="<?php if (isset($_SESSION['name'])) {
                        echo $_SESSION['name'];
                    } ?>">
                </label><br/>
                <label><strong>Commentaire :</strong></label>
                <br/><textarea name="textAddComment"></textarea><br/>
                <p><input type="submit" name="sendCom" value="Envoyer"></p>
            </form>
        </div>
    </footer>
    <?php
}
?>


<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
