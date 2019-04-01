<?php
session_start();

require('../vendor/autoload.php');
use controller\NewsController;
use model\News;

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
