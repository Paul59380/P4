<?php
ob_start();
include('sectionForm.php');
?>
<div id="identifyAccount">
    <form method="post">
        <p>
            <label>
                <em> Nom d'utilisateur : </em><br/>
                <input type="text" name="pseudo"/>
            </label>
        </p>

        <p>
            <label>
                <em> Password: </em><br/>
                <input type="password" name="password"/>
            </label>
        </p>

        <p>
            <input type="submit" name="send" value="Envoyer"/>
            <input type="submit" name="verify" value="vérifier"/>
        </p>
    </form>
</div>


<?php
$content = ob_get_clean();
require ('template.php');
?>

