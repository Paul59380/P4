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
            <em>Billet simple</em>
        </p>
        <hr id="headerHr">

        <p id="headerText2">
            <em>Pour l'Alaska</em>
        </p>
    </div>
</section>