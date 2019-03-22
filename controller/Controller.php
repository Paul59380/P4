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

        require('../view/frontend/displayHome.php');
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
                require('../view/frontend/commentView.php');

            } else {
                echo "Billet inexistant !";
            }
        }
    }

    public function createAccount()
    {
        $db = PDOFactory::connectedAtDataBase();
        $manager = new UserManager($db);

        if (isset($_POST['pseudo']) && isset($_POST['password']) && isset($_POST['send'])) {

            if (!empty($_POST['pseudo']) && !empty($_POST['password'])) {
                $manager->addUserAccount($_POST['pseudo'], password_hash($_POST['password'], PASSWORD_DEFAULT));
            }
            elseif (!empty($_POST['pseudo']) && empty($_POST['password']) && isset($_POST['send'])) {

                $manager->addVisitorAccount($_POST['pseudo'], $_POST['password']);
            }
            else {
                header('Location:index.php');
            }
        }
    }
}