<?php
/**
 * Created by PhpStorm.
 * User: paulg
 * Date: 21/03/2019
 * Time: 13:52
 */

class Controller
{




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