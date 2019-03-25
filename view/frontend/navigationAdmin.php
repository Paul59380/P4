<nav>
    <ul class="allNavigationBar">
        <?php
        if (isset($_SESSION['name'])){
            echo "<strong style='color:red'>Admin :</strong><li id='userSession'>" .$_SESSION['name'] . "</li>";
        };
        ?>
        <li class="logoMontain"><a href="index.php"> <i class="fas fa-mountain fa-2x"></i> </a> </li>
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