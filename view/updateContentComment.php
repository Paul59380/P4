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

$controller = new Controller();
$update = $controller->updateComments($_GET['id'], $_POST['textUpdate'], $_GET['idOrigin']);
$id = $_GET['id'];
//header('Location:updateComment.php?id='.$id);
header('Location:adminComments.php');
