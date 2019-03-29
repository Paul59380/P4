<?php
function autoload($className)
{
    if (file_exists($path = '../model/' . $className . '.php')) {
        require $path;
    } elseif (file_exists($pathTwo = "../controller/" . $className . '.php')) {
        require $pathTwo;
    }
}

spl_autoload_register('autoload');

$controller = ReportedCommentController::getInstance();

if(isset($_GET['id']) && isset($_GET['origin'])){
    $controller->deleteComments($_GET['id'], $_GET['origin']);
    header('Location:adminComments.php');
} else {
    $controller->validComment($_GET['id']);
    header('Location:adminComments.php');
}
