<?php

require('../vendor/autoload.php');
use controller\CommentController;

$getComments = CommentController::getInstance();
$getComments->getComments();

