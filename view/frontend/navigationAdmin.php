<nav>
    <ul class="allNavigationBarAdmin">
        <?php
        if (isset($_SESSION['name'])) {
            echo "<li><a style='color:red; font-weight: bold' href='index.php'> Admin :</a></li><li id='userSession'>"
                . htmlspecialchars($_SESSION['name']) . "</li>";
        };
        ?>
        <li class="logoMontain"><a title="Acceuil" href="index.php"> <i class="fas fa-igloo fa-2x"></i> </a></li>
        <li><a title="Gérer les news" href="index.php?action=adminListNews"><i style="padding-right: 25px;flex-wrap: wrap"
                                                        class="fas fa-highlighter fa-2x"></i></a></li>
        <li><a title="Commentaires signalés" href="index.php?action=adminComments"><i style="padding-right: 25px;flex-wrap: wrap"
                                                        class="fas fa-comments fa-2x"></i></a></li>
        <li><a title="Nouvelle news" href="index.php?action=adminWysiwyg"><i style="padding-right: 25px;flex-wrap: wrap"
                                                       class="fas fa-feather-alt fa-2x"></i></a></li>
        <li><a title="Déconnexion" href="index.php?deconnexion"><i style="padding-right: 25px;flex-wrap: wrap"
                                               class="fas fa-sign-out-alt fa-2x"></i></a></li>
    </ul>
</nav>

<?php
if (isset($_GET['deconnexion'])) {
    header('Location:index.php');
    session_destroy();
}
?>
