<?php
session_start();

require('../vendor/autoload.php');
use controller\ReportedCommentController;

$controller = ReportedCommentController::getInstance();
$test = $controller->getReportedComment($_GET['id']);
require('frontend/updateComment.php');
