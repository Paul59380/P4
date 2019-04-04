<?php
session_start();

require('../vendor/autoload.php');

use controller\CommentController;
use controller\NewsController;
use controller\ReportedCommentController;
use controller\UserController;
use model\News;
use model\SignedCommentManager;
use model\UserManager;

if (!isset($_GET['action'])) {
    $getListNews = NewsController::getInstance();
    $getListNews->getList();
} elseif ($_GET['action'] == "getComments" && $_GET['news']) {
    $getComments = CommentController::getInstance();
    $getComments->getComments();
} elseif ($_GET['action'] == "addComment" && isset($_GET['id']) && isset($_GET['idUser'])) {
    echo "hello";
    $controller = CommentController::getInstance();
    $addComment = $controller->addComment($_GET['idUser'], $_GET['id'], $_POST['textAddComment']);
    header('Location:index.php?action=getComments&news=' . $_GET['id']);
} elseif ($_GET['action'] == "signedComment" && isset($_GET['news']) && isset($_GET['comment'])) {
    $controller = CommentController::getInstance();

    $test = $controller->getComment($_GET['comment']);

    $insert = $controller->signedComment(
        $_GET['comment'],
        $_GET['news'],
        $test->getUser()->getId(),
        $test->getContainsComment(),
        $test->getDateCreate());

    header('Location:index.php?action=getComments&news=' . $_GET['news']);
} elseif ($_GET['action'] == "updateComment" && isset($_GET['id'])) {
    $controller = ReportedCommentController::getInstance();
    $test = $controller->getReportedComment($_GET['id']);
    require('frontend/updateComment.php');
} elseif ($_GET['action'] == "updateContentComment" && isset($_GET['id'])) {
    $controller = ReportedCommentController::getInstance();
    $update = $controller->updateComments($_GET['id'], $_POST['textUpdate'], $_GET['idOrigin']);
    $controller->validComment($_GET['id']);
    header('Location:index.php?action=adminComments');
} elseif ($_GET['action'] == "deleteComment" && isset($_GET['id']) && isset($_GET['origin'])) {
    $controller = ReportedCommentController::getInstance();
    $controller->deleteComments($_GET['id'], $_GET['origin']);
    header('Location:index.php?action=adminComments');
} elseif ($_GET['action'] == "validComment" && isset($_GET['id'])) {
    $controller = ReportedCommentController::getInstance();
    $controller->validComment($_GET['id']);
    header('Location:index.php?action=adminComments');
} elseif ($_GET['action'] == "adminComments") {
    $signedCommentManager = SignedCommentManager::getInstance();
    $commentSigned = $signedCommentManager->resortCommentsSigned();
    require('frontend/adminComments.php');
} elseif ($_GET['action'] == "adminListNews") {
    $getListNews = NewsController::getInstance();
    $getListNews->getListAdmin();
} elseif ($_GET['action'] == "adminWysiwyg") {
    $controller = NewsController::getInstance();
    if (!isset($_GET['news'])) {
        ob_start();
        include('frontend/sectionHome.php');
        include('frontend/wysiwyg.php');
        $content = ob_get_clean();
        require('frontend/template.php');

        if (!empty($_POST['titleNews']) && !empty($_POST['newsText']) && isset($_POST['sendNews'])) {
            $controller->addNews($_SESSION['id'], $_POST['titleNews'], strip_tags($_POST['newsText']));
            header('Location:index.php');
        }
    } elseif (isset($_GET['delete'])) {
        $deleteNews = $controller->deleteNews($_GET['news']);
        header('Location:index.php');
    } else {
        $news = $controller->getNews($_GET['news']);

        $new = new News($news);
        ob_start();
        include('frontend/sectionHome.php');
        include('frontend/wysiwyg.php');
        $content = ob_get_clean();
        require('frontend/template.php');

        if (!empty($_POST['titleNews']) && !empty($_POST['newsText']) && isset($_POST['sendNews'])) {
            $updateNews = $controller->updateNews($_GET['news'], $_POST['titleNews'], strip_tags($_POST['newsText']));
            echo "<script>
            document.location.href=\"index.php\"
        </script>";
        }
    }
} elseif ($_GET['action'] == "connexion") {
    require('frontend/connectionForm.php');

    $controller = UserController::getInstance();
    $userManager = UserManager::getInstance();

    if (!empty($_POST['pseudo']) && !empty($_POST['password']) && isset($_POST['send'])) {
        if (!$controller->userManager->exists($_POST['pseudo'])) {
            $controller->createAccount();
            $controller->userAccount($userManager);
        } else {
            echo "<p class='error'>Ce personnage existe déjà !</p>";
        }
    } elseif (!empty($_POST['pseudo']) && empty($_POST['password']) && isset($_POST['send'])) {
        if (!$controller->userManager->exists($_POST['pseudo'])) {
            $controller->createAccount();
            $controller->visitorAccount($userManager);
        } else {
            echo "<p class='error'>Le compte visiteur " . $_POST['pseudo'] .
                " ne pas pas être crée car ce pseudo existe déjà !</p>";
        }
    } elseif (!empty($_POST['pseudo']) && !empty($_POST['password']) && isset($_POST['verify'])) {
        try {
            $controller->userAccount($userManager);
        } catch (Exception $e) {
            echo('<p class="error" ">Erreur : ' . $e->getMessage() . '</p>');
        }
    } elseif (!empty($_POST['pseudo']) && empty($_POST['password']) && isset($_POST['verify'])) {
        try {
            if ($_POST['password'] == "") {
                $controller->visitorAccount($userManager);
            }
        } catch (Exception $e) {
            echo('<p class="error" ">Erreur : ' . $e->getMessage() . '</p>');
        }
    }
}






/*
 * else {
    // redirect 404
}
 */

