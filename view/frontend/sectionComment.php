<?php
if (isset($_SESSION['name'])){
    include('navigationConnect.php');
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