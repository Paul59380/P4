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

    public function commentsSigned()
    {
        $db = PDOFactory::connectedAtDataBase();
        $signedCommentManager = new SignedCommentManager($db);

        $comment = $signedCommentManager->resortCommentsSigned();
        return $comment;
    }

    public function addNews($idAuthor, $titleNews, $containsNews)
    {
        $db = PDOFactory::connectedAtDataBase();
        $newsManager = new NewsManager($db);

        $addNews = $newsManager->addNews($idAuthor, $titleNews, $containsNews);
        return $addNews;
    }

    public function getReportedComment($infoComment)
    {
        $db = PDOFactory::connectedAtDataBase();
        $reportedCommentManager = new ReportedCommentManager($db);

        $testComment = $reportedCommentManager->getComment($infoComment);
        //var_dump($testComment);
        return $testComment;
    }

    public function updateComments($id, $content, $idOriginal)
    {
        $db = PDOFactory::connectedAtDataBase();
        $reportedManager = new ReportedCommentManager($db);

        $reportedManager->updateComment($id, $content, $idOriginal);
        return $reportedManager;
    }

    public function deleteComments($idComment, $idOriginal)
    {
        $db = PDOFactory::connectedAtDataBase();
        $reportedManager =  new ReportedCommentManager($db);

        $reportedManager->deleteComment($idComment, $idOriginal);
        return $reportedManager;
    }

    public function addComment($idUser, $getUrlIdNews, $containsComment)
    {
        $db = PDOFactory::connectedAtDataBase();
        $commentManager = new CommentsManager($db);

        $commentManager->addComment($idUser, $getUrlIdNews, $containsComment);
        return $commentManager;
    }

    public function getComment($infosComment)
    {
        $db = PDOFactory::connectedAtDataBase();
        $commentManager = new CommentsManager($db);

        return $commentManager->getComment($infosComment);
    }

    public function signedComment($id_comment, $id_news, $id_user, $contains_comment, $date)
    {
        $db = PDOFactory::connectedAtDataBase();
        $commentManager = new CommentsManager($db);

        $commentManager->insertedCommentsSigned($id_comment, $id_news, $id_user, $contains_comment, $date);
        return $commentManager;
    }
}