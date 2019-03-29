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
                        echo '<a href="adminWysiwyg.php?news=' .
                            htmlspecialchars($new->getId()) .
                            '"><strong style="color: green"><i class="fas fa-pencil-alt fa-1x"></i></strong></a>';
                        echo '<a href="adminWysiwyg.php?delete=0&news=' .
                            htmlspecialchars($new->getId()) .
                            '"><strong style="margin-left: 20px; color: red"><i class="fas fa-times-circle fa-1x"></i></strong></a>';
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
