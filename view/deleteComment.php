<?php
require('../vendor/autoload.php');
use controller\ReportedCommentController;

$controller = ReportedCommentController::getInstance();

if(isset($_GET['id']) && isset($_GET['origin'])){
    $controller->deleteComments($_GET['id'], $_GET['origin']);
    header('Location:adminComments.php');
} else {
    $controller->validComment($_GET['id']);
    header('Location:adminComments.php');
}
