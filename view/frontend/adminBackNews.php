<?php
ob_start();
include('sectionHome.php');
?>
<div id="textAdmin">
    <h2 id="adminNews">Partie de modification des news publiées</h2>
</div>
<?php
foreach ($news as $new) {
    ?>
    <div id="listNews">
        <div class="news">
            <h2>
                <?php
                if (isset($_SESSION['name'])) {
                    if ($_SESSION['name'] == "Jean Frtrch") {
                        echo '<a href="index.php?action=adminWysiwyg&news=' .
                            htmlspecialchars($new->getId()) .
                            '"><strong style="color: green"><i title="Modifier la news" class="fas fa-pencil-alt fa-1x"></i></strong></a>';
                        echo '<a href="index.php?action=adminWysiwyg&delete=0&news=' .
                            htmlspecialchars($new->getId()) .
                            '"><strong style="margin-left: 20px; color: red"><i title="Supprimer la news" class="fas fa-times-circle fa-1x"></i></strong></a>';
                    }
                }
                ?> <br/>
                <em>
                    <?= htmlspecialchars($new->getTitleNews()) ?>
                </em> <br/>
                <span> mis en ligne le : <?= htmlspecialchars($new->getDateCreate()) ?> </span> <br/>
            </h2>
        </div>
    </div>
    <?php
}
?>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
