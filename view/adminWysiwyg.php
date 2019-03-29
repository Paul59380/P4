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

$controller = NewsController::getInstance();

if(!isset($_GET['news'])){
    ob_start();
    include('frontend/sectionHome.php');
    include('frontend/wysiwyg.php');
    $content = ob_get_clean();
    require('frontend/template.php');

    if (!empty($_POST['titleNews']) && !empty($_POST['newsText']) && isset($_POST['sendNews']))
    {
        $controller->addNews($_SESSION['id'], $_POST['titleNews'],strip_tags($_POST['newsText']));
        header('Location:index.php');
    }
} elseif (isset($_GET['delete'])){
    $deleteNews = $controller->deleteNews($_GET['news']);
    header('Location:index.php');
}
else {
    $news = $controller->getNews($_GET['news']);

    $new = new News($news);
    ob_start();
    include('frontend/sectionHome.php');
    include('frontend/wysiwyg.php');
    $content = ob_get_clean();
    require('frontend/template.php');

    if (!empty($_POST['titleNews']) && !empty($_POST['newsText']) && isset($_POST['sendNews']))
    {
        $updateNews = $controller->updateNews($_GET['news'],$_POST['titleNews'], strip_tags($_POST['newsText']));
        echo "<script>
            document.location.href=\"index.php\"
        </script>";
    }
}
