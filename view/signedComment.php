<?php
require('../vendor/autoload.php');
use controller\CommentController;

$controller = CommentController::getInstance();

$test = $controller->getComment($_GET['comment']);

$insert = $controller->signedComment(
        $_GET['comment'],
        $_GET['news'],
        $test->getUser()->getId(),
        $test->getContainsComment(),
        $test->getDateCreate());

header('Location:getComments.php?news=' .$_GET['news']);
