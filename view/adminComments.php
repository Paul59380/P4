<?php
session_start();

require('../vendor/autoload.php');
use model\SignedCommentManager;

$signedCommentManager = SignedCommentManager::getInstance();

$commentSigned = $signedCommentManager->resortCommentsSigned();
require('frontend/adminComments.php');