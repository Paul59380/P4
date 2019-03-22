<?php
session_start();
require('frontend/connectionForm.php');
function autoload($className)
{
    if (file_exists($path = '../model/'. $className . '.php')) {
        require $path;
    }
    elseif (file_exists($pathTwo = "../controller/" .$className . '.php')) {
        require $pathTwo;
    }
}


spl_autoload_register('autoload');

$db = PDOFactory::connectedAtDataBase();
$userManager = new UserManager($db);


if(isset($_POST['pseudo']) && isset($_POST['password']) && isset($_POST['send']))
{
    if(!$userManager->exists($_POST['pseudo'])){
        $identify = new Controller();
        $identify->createAccount();

        $data = $userManager->checkAccount($_POST['pseudo'], $_POST['password']);
        $user = $userManager->getUser($data['id']);
        $_SESSION['name'] = $user->getPseudo();
        echo $_SESSION['name'];
    }
    else {
        echo "Ce personnage existe déjà !";
    }

}
elseif (isset($_POST['pseudo']) && isset($_POST['password']) && isset($_POST['verify']))
{

    $data = $userManager->checkAccount($_POST['pseudo'], $_POST['password']);
    $user = $userManager->getUser($data['id']);
    $_SESSION['name'] = $user->getPseudo();
    header('Location:index.php');
}


