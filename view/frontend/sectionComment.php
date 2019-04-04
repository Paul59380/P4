<?php
if (isset($_SESSION['name'])) {
    if ($_SESSION['name'] != "Jean Frtrch") {
        include('navigationConnect.php');
    } else {
        include('navigationAdmin.php');
    }
} else {
    include('navigationPublic.php');
}
?>

<br/>
<br/>
<section id="headerComment">
    <div id="contentHeader">
        <p id="headerText1">
            <em>Découvrez tous les </em>
        </p>
        <hr id="headerHr">

        <p id="headerText2">
            <em>Commentaires</em>
        </p>
    </div>
</section>
