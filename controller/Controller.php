<?php
/**
 * Created by PhpStorm.
 * User: paulg
 * Date: 21/03/2019
 * Time: 13:52
 */

class Controller
{
    public function commentsSigned()
    {
        $db = PDOFactory::connectedAtDataBase();
        $signedCommentManager = new SignedCommentManager($db);

        $comment = $signedCommentManager->resortCommentsSigned();
        return $comment;
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
}