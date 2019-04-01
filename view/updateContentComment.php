<?php
require('../vendor/autoload.php');
use controller\ReportedCommentController;

$controller = ReportedCommentController::getInstance();
$update = $controller->updateComments($_GET['id'], $_POST['textUpdate'], $_GET['idOrigin']);
$controller->validComment($_GET['id']);
header('Location:adminComments.php');
