<nav>
    <ul class="allNavigationBar">
        <?php
        if (isset($_SESSION['name'])){
            echo "<li id='userSession'><a style='color: #01991f' href='index.php'> " .$_SESSION['name'] . "</a></li>";
        };
        ?><li class="logoMontain"><a href="index.php"> <i class="fas fa-igloo fa-2x"></i> </a> </li>
        <li><a style="margin-left: 20%" href="index.php">Acceuil</a></li>
        <?php
        if (!isset($_SESSION['name'])){
            echo "<li><a href=\"connexion.php\">Se connecter</a></li>";
        };
        ?>
        <li><a href="index.php?deconnexion">Déconnexion</a> </li>
    </ul>
</nav>

<?php
if(isset($_GET['deconnexion']))
{
    header('Location:index.php');
    session_destroy();
}
?>
