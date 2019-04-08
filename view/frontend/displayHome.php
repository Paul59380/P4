<?php
ob_start();
include('sectionHome.php');
?>
<div id="blocPresentation">
    <div id="imagePresentation">
        <img src="../public/images/jean.png" alt="Jean Forteroche" title="Photo Jean Forteroche"/>
    </div>
    <div id="textPresentation">
        <span>
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
        </span>
        <h3 style="text-align: left"><em>Jean Forteroche</em></h3>
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
                        echo '<a href="index.php?action=adminWysiwyg&news=' .
                            htmlspecialchars($new->getId()) .
                            '"><strong style="color: green"><i class="fas fa-pencil-alt fa-1x"
                               title="Modifier la news"></i></strong></a>';
                        echo '<a href="index.php?action=adminWysiwyg&delete=0&news=' .
                            htmlspecialchars($new->getId()) .
                            '"><strong style="margin-left: 20px; color: red"><i class="fas fa-times-circle fa-1x" title="Supprimer la news"></i></strong></a>';
                    }
                }
                ?> <br/>
                <em>
                    <?= htmlspecialchars($new->getTitleNews()) ?>
                </em> <br/>
                <span> mis en ligne le : <?= htmlspecialchars($new->getDateCreate()) ?> </span> <br/>
            </h2>
            <p id="contains_news">
                <?= substr(htmlspecialchars($new->getContainsNews()), 0, 580) .
                ' ...<br/><strong><a style="text-decoration: none; color: red" title="Lire la suite" href="index.php?action=getComments&news=' . $new->getId() . '">
                ... Lire la suite</a> </strong>' ?>
            </p>
        </div>
    </div>
    <?php
}
?>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
