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
$test = $controller->getComment($_GET['comment']);

$insert = $controller->signedComment(
        $_GET['comment'],
        $_GET['news'],
        $test->getUser()->getId(),
        $test->getContainsComment(),
        $test->getDateCreate());

header('Location:getComments.php?news=' .$_GET['news']);
