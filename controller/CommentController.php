<?php
/**
 * Created by PhpStorm.
 * User: paulg
 * Date: 28/03/2019
 * Time: 11:31
 */

class CommentController
{
    protected $db;
    protected $commentManager;

    public function __construct()
    {
        $this->db = PDOFactory::connectedAtDataBase();
        $this->commentManager = new CommentsManager($this->db);
    }

    public function getComments()
    {
        if (isset($_GET['news'])) {
            if ($_GET['news'] >= 0) {

                $comments = $this->commentManager->getCommentsNews($_GET['news']);
                $newsManager = new NewsManager($this->db);
                $news = $newsManager->getNews($_GET['news']);
                require('../view/frontend/commentView.php');

            } else {
                echo "Billet inexistant !";
            }
        }
    }

    public function addComment($idUser, $getUrlIdNews, $containsComment)
    {
        $this->commentManager->addComment($idUser, $getUrlIdNews, $containsComment);
        return $this->commentManager;
    }

    public function getComment($infosComment)
    {
        return $this->commentManager->getComment($infosComment);
    }

    public function signedComment($id_comment, $id_news, $id_user, $contains_comment, $date)
    {
        $this->commentManager->insertedCommentsSigned($id_comment, $id_news, $id_user, $contains_comment, $date);
        return $this->commentManager;
    }
}