<nav>
    <ul class="allNavigationBarAdmin">
        <?php
        if (isset($_SESSION['name'])) {
            echo "<strong><a style='color:red' href='index.php'> Admin :</strong></a><li id='userSession'>"
                . htmlspecialchars($_SESSION['name']) . "</li>";
        };
        ?>
        <li class="logoMontain"><a href="index.php"> <i class="fas fa-igloo fa-2x"></i> </a></li>
        <li><a href="index.php?action=adminListNews"><i style="padding-right: 25px;flex-wrap: wrap"
                                                        class="fas fa-highlighter fa-2x"></i></a></li>
        <li><a href="index.php?action=adminComments"><i style="padding-right: 25px;flex-wrap: wrap"
                                                        class="fas fa-comments fa-2x"></i></a></li>
        <li><a href="index.php?action=adminWysiwyg"><i style="padding-right: 25px;flex-wrap: wrap"
                                                       class="fas fa-feather-alt fa-2x"></i></a></li>
        <li><a href="index.php?deconnexion"><i style="padding-right: 25px;flex-wrap: wrap"
                                               class="fas fa-sign-out-alt fa-2x"></i></a></li>
    </ul>
</nav>

<?php
if (isset($_GET['deconnexion'])) {
    header('Location:index.php');
    session_destroy();
}
?>
