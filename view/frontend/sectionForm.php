<?php
if (isset($_SESSION['name'])){
    include('navigationConnect.php');
} else {
    include('navigationPublic.php');
}
?>
<br/>
<section id="headerHome">
    <div id="contentHeader">
        <p id="headerText1">
            <em>Créez votre compte</em>
        </p>
        <hr id="headerHr">

        <p id="headerText2">
            <em>Authentification</em>
        </p>
    </div>
</section>