<nav>
    <ul class="allNavigationBar">
        <?php
        if (isset($_SESSION['name'])){
            echo "<strong><a style='color:red' href='index.php'> Admin :</strong></a><li id='userSession'>" .$_SESSION['name'] . "</li>";
        };
        ?>
        <li class="logoMontain"><a href="index.php"> <i class="fas fa-igloo fa-2x"></i> </a> </li>
        <li><a href="adminListNews.php">Liste News</a> </li>
        <li><a href="adminComments.php">Comments</a></li>
        <li><a href="adminWysiwyg.php">Rédaction</a></li>
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