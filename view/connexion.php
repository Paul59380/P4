<?php
session_start();
require('frontend/connectionForm.php');
require('../vendor/autoload.php');
use controller\UserController;
use model\UserManager;

$controller = UserController::getInstance();
$userManager = UserManager::getInstance();

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
    try{
        if ($_POST['password'] == "") {
            $controller->visitorAccount($userManager);
        }
    }catch ( Exception $e){
        echo('<p class="error" ">Erreur : ' . $e->getMessage() . '</p>');
    }
}
