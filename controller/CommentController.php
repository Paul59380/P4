<?php
/**
 * Created by PhpStorm.
 * User: paulg
 * Date: 28/03/2019
 * Time: 11:31
 */
namespace controller;
use model\CommentsManager;
use model\NewsManager;

class CommentController
{
    protected $commentManager;
    protected static $instance;

    protected function __construct()
    {
        $this->commentManager = CommentsManager::getInstance();
    }

    protected function __clone() {}

    public static function getInstance()
    {
        if(!isset(self::$instance)){
            self::$instance = new self;
        }

        return self::$instance;
    }

    public function getComments()
    {
        if (isset($_GET['news'])) {
            if ($_GET['news'] >= 0) {

                $comments = $this->commentManager->getCommentsNews($_GET['news']);
                $newsManager = NewsManager::getInstance();
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