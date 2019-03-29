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

$controller = UserController::getInstance();
$userManager = new UserManager();

if (!empty($_POST['pseudo']) && !empty($_POST['password']) && isset($_POST['send'])) {
    if (!$controller->userManager->exists($_POST['pseudo'])) {
        $controller->createAccount();
        $controller->userAccount($userManager);
    } else {
        echo "<p class='error'>Ce personnage existe déjà !</p>";
    }
} elseif (!empty($_POST['pseudo']) && empty($_POST['password']) && isset($_POST['send'])) {
    if (!$controller->userManager->exists($_POST['pseudo'])) {
        $controller->createAccount();
        $controller->visitorAccount($userManager);
    } else {
        echo "<p class='error'>Le compte visiteur " . $_POST['pseudo'] .
            " ne pas pas être crée car ce pseudo existe déjà !</p>";
    }
} elseif (!empty($_POST['pseudo']) && !empty($_POST['password']) && isset($_POST['verify'])) {
    try {
        $controller->userAccount($userManager);
    } catch (Exception $e) {
        echo('<p class="error" ">Erreur : ' . $e->getMessage() . '</p>');
    }
} elseif (!empty($_POST['pseudo']) && empty($_POST['password']) && isset($_POST['verify'])) {

    if ($_POST['password'] == "") {
        $controller->visitorAccount($userManager);
    }
}
