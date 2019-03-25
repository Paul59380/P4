<?php
session_start();

function autoload($className)
{
    if (file_exists($path = '../model/' . $className . '.php')) {
        require $path;
    } elseif (file_exists($pathTwo = "../controller/" . $className . '.php')) {
        require $pathTwo;
    }
}

spl_autoload_register('autoload');

ob_start();
include('frontend/sectionHome.php');
include ('frontend/wysiwyg.php');
$content = ob_get_clean();
require('frontend/template.php');

if (!empty($_POST['titleNews']) && !empty($_POST['newsText']) && isset($_POST['sendNews']))
{
    $addNews = new Controller();
    $addNews->addNews($_SESSION['id'], $_POST['titleNews'],strip_tags($_POST['newsText']));
    header('Location:index.php');
}