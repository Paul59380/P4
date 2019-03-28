<?php
/**
 * Created by PhpStorm.
 * User: paulg
 * Date: 21/03/2019
 * Time: 13:52
 */

class ReportedCommentController
{
    protected $db;
    protected $reportedCommentManager;

    public function __construct()
    {
        $this->db = PDOFactory::connectedAtDataBase();
        $this->reportedCommentManager = new ReportedCommentManager($this->db);
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