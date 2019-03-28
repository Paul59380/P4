<?php
/**
 * Created by PhpStorm.
 * User: paulg
 * Date: 21/03/2019
 * Time: 13:52
 */

class ReportedCommentController
{
    public function getReportedComment($infoComment)
    {
        $db = PDOFactory::connectedAtDataBase();
        $reportedCommentManager = new ReportedCommentManager($db);

        $testComment = $reportedCommentManager->getComment($infoComment);
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
}