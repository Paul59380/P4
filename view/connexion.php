<?php
session_start();
require('frontend/connectionForm.php');
function autoload($className)
{
    if (file_exists($path = '../model/' . $className . '.php')) {
        require $path;
    } elseif (file_exists($pathTwo = "../controller/" . $className . '.php')) {
        require $pathTwo;
    }
}

spl_autoload_register('autoload');

$db = PDOFactory::connectedAtDataBase();
$userManager = new UserManager($db);

$identify = new UserController();

if (!empty($_POST['pseudo']) && !empty($_POST['password']) && isset($_POST['send'])) {

    if (!$userManager->exists($_POST['pseudo'])) {
        $identify->createAccount();

        $data = $userManager->checkAccountUser($_POST['pseudo'], $_POST['password']);
        $user = $userManager->getUser($data['id']);
        $_SESSION['name'] = $user->getPseudo();
        $_SESSION['id'] = $user->getId();
        header('Location:index.php');
    } else {
        echo "Ce personnage existe déjà !";
    }

} elseif (!empty($_POST['pseudo']) && empty($_POST['password']) && isset($_POST['send'])) {

    if (!$userManager->exists($_POST['pseudo'])) {
        $identify->createAccount();

        $data = $userManager->checkAccountVisitor($_POST['pseudo']);
        $user = $userManager->getUser($data['id']);
        $_SESSION['name'] = $user->getPseudo();
        $_SESSION['id'] = $user->getId();
        header('Location:index.php');
    } else {
        echo "<p style='text-align: center'>Le compte visiteur " . $_POST['pseudo'] .
            " ne pas pas être crée car ce pseudo existe déjà !</p>";
    }
} elseif (!empty($_POST['pseudo']) && !empty($_POST['password']) && isset($_POST['verify'])) {

    $data = $userManager->checkAccountUser($_POST['pseudo'], $_POST['password']);
    $user = $userManager->getUser($data['id']);
    $_SESSION['name'] = $user->getPseudo();
    $_SESSION['id'] = $user->getId();
    header('Location:index.php');

} elseif (!empty($_POST['pseudo']) && empty($_POST['password']) && isset($_POST['verify'])) {

    if($_POST['password'] == ""){
        $data = $userManager->checkAccountVisitor($_POST['pseudo']);
        var_dump($data);
        $user = $userManager->getUser($data['id']);
        $_SESSION['name'] = $user->getPseudo();
        $_SESSION['id'] = $user->getId();
        header('Location:index.php');
    }
}
