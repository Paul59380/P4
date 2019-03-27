<?php
session_start();
ob_start();
include('sectionComment.php')
?>
<br/>
<a class="returnIndex" href="index.php">Retour à la liste de news</a>

<div id="listNews">
    <div class="news">
        <h2><?= htmlspecialchars(htmlspecialchars($news->getTitleNews())) ?> <br/>
            <span> mis en ligne le : <?= htmlspecialchars($news->getDateCreate()) ?> </span>
        </h2>

        <p id="contains_news">
            <?= htmlspecialchars($news->getContainsNews()) ?>
        </p>
    </div>
</div>

<h2 style="text-align: center"><em>Liste de commentaires : </em></h2>
<?php
foreach ($comments as $comment) {
    ?>
    <div id="commentUser">
        <p id="descriptComment">
            <?= htmlspecialchars($comment->getUser()->getPseudo()) ?> <br/>
            <?= $comment->getDateCreate() ?>
            <a href="signedComment.php?news=<?= $news->getId() ?>&comment=<?= $comment->getId() ?>">
                <i style="color: #f44542; padding-left: 10px" class="fas fa-exclamation-triangle fa-1x"></i></a>
        </p>
        <p id="containsComment"><?= htmlspecialchars($comment->getContainsComment()) ?> </p>
        <?php
        ?>
    </div>
    <?php
}
?>
<?php if (isset($_SESSION['name'])) {
    ?>
    <hr style="width: 60%;  margin-top: 100px"/>
    <h2 style="text-align: center"><em> <?php
                echo htmlspecialchars($_SESSION['name']);
            ?> , n'hésitez pas à laisser votre avis ! </em></h2>
    <footer>
        <div id="footerRight">
            <form action="addComment.php?id=<?= $news->getId() ?>&idUser=<?= $_SESSION['id'] ?>" method="post">
                <label><strong>Pseudo :</strong><br/>
                    <input type="text" name="pseudoComment" value="<?php if (isset($_SESSION['name'])) {
                        echo htmlspecialchars($_SESSION['name']);
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
