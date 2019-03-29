<?php
/**
 * Created by PhpStorm.
 * User: paulg
 * Date: 21/03/2019
 * Time: 13:52
 */

class ReportedCommentController
{
    protected $reportedCommentManager;
    protected static $instance;

    protected function __construct()
    {
        $this->reportedCommentManager = new ReportedCommentManager();
    }

    protected function __clone()
    {
        // TODO: Implement __clone() method.
    }

    public static function getInstance()
    {
        if(!isset(self::$instance)){
            self::$instance = new self;
        }

        return self::$instance;
    }

    public function getReportedComment($infoComment)
    {
        $testComment = $this->reportedCommentManager->getComment($infoComment);
        return $testComment;
    }

    public function updateComments($id, $content, $idOriginal)
    {
        $this->reportedCommentManager->updateComment($id, $content, $idOriginal);
        return $this->reportedCommentManager;
    }

    public function deleteComments($idComment, $idOriginal)
    {
        $this->reportedCommentManager->deleteComment($idComment, $idOriginal);
        return $this->reportedCommentManager;
    }
}