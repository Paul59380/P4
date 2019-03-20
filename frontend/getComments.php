<?php


function autoload($className)
{
    if(file_exists($path = '../'.$className.'.php')){
        require $path;
    }
}

spl_autoload_register('autoload');
$db = PDOFactory::connectedAtDataBase();

if(isset($_GET['news'])){
    if($_GET['news'] <= 1){
        $commentManager = new CommentsManager($db);

        $comments = $commentManager->getCommentsNews($_GET['news']);
        $newsManager = new NewsManager($db);

        $news = $newsManager->getNews($_GET['news']);

        require('commentView.php');
    }
    else {
        echo "Billet inexistant !";
    }
}

