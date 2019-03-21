<?php
/**
 * Created by PhpStorm.
 * User: paulg
 * Date: 21/03/2019
 * Time: 13:52
 */

class Controller
{
    public function getList()
    {
        $db = PDOFactory::connectedAtDataBase();
        $manager = new NewsManager($db);
        $news = $manager->getListNews();

        require('../../view/frontend/displayHome.php');
    }

    public function getComments()
    {
        $db = PDOFactory::connectedAtDataBase();

        if (isset($_GET['news'])) {
            if ($_GET['news'] >= 0) {

                $commentManager = new CommentsManager($db);
                $comments = $commentManager->getCommentsNews($_GET['news']);
                $newsManager = new NewsManager($db);
                $news = $newsManager->getNews($_GET['news']);
                require('../../view/frontend/commentView.php');

            } else {
                echo "Billet inexistant !";
            }
        }
    }

}