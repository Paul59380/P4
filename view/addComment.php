<?php

require('../vendor/autoload.php');
use controller\CommentController;

$controller = CommentController::getInstance();
$addComment = $controller->addComment($_GET['idUser'], $_GET['id'], $_POST['textAddComment']);
header('Location:getComments.php?news='.$_GET['id']);