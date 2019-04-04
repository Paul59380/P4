<nav>
    <ul class="allNavigationBarConnect">
        <?php
        if (isset($_SESSION['name'])) {
            echo "<li id='userSession'><a style='color: #01991f' href='index.php'> " . $_SESSION['name'] . "</a></li>";
        };
        ?>
        <li class="logoMontain"><a href="index.php"> <i class="fas fa-igloo fa-2x"></i> </a></li>

        <li><a href="index.php?deconnexion"><i class="fas fa-sign-out-alt fa-2x"></i></a></li>
    </ul>
</nav>

<?php
if (isset($_GET['deconnexion'])) {
    header('Location:index.php');
    session_destroy();
}
?>
