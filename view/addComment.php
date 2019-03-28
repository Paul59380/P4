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

$controller = new CommentController();
$addComment = $controller->addComment($_GET['idUser'], $_GET['id'], $_POST['textAddComment']);
header('Location:getComments.php?news='.$_GET['id']);