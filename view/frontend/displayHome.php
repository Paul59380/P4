<?php
ob_start();
include('sectionHome.php');
?>
<div id="blocPresentation">
    <div id="imagePresentation">
        <img src="../public/images/jean.png">
    </div>
    <div id="textPresentation">
        <p>
            <?php if (isset($_SESSION['name'])) {
                echo '<h4>Bienvenue à vous ' . $_SESSION['name'] . ' !</h4>';
            } else {
                echo "<h4>Bienvenue à vous chers lecteurs !</h4>";
            } ?>
            <br/>
            Comme annoncé par la presse, mon prochain livre "Billet simple pour l'Alaska" sera disponible gratuitement
            sur mon site web. <br/>

            Le roman sera découpé en plusieurs parties qui seront publiées à une semaine d'intervalle.
            Pour améliorer l'expérience, des commentaires pourront être édités par les utilisateurs mais aussi par les
            visiteurs
            du site. <br/>

            Vous pouvez dès à présent lire mon nouveau roman intitulé "Billet simple pour l'Alaska". <br/><br/>
        <h3 style="text-align: left"><em>Jean Forteroche</em></h3>
        </p>
    </div>
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
            <p id="contains_news">
                <?= substr($new->getContainsNews(), 0, 580) .
                ' ...<br/><strong><a style="text-decoration: none; color: red" href="getComments.php?news=' . $new->getId() . '">
                ... Lire la suite</a> </strong>' ?>
            </p>
            <p id="getComments">
                <!--<button><a href="getComments.php?news=<?= $new->getId() ?>" ><strong>Accès aux commentaires</strong></a></button>!-->
            </p>
        </div>
    </div>
    <?php
}
?>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
