<?php
session_start();

require('../vendor/autoload.php');
use model\PDOFactory;
use model\SignedCommentManager;

$db = PDOFactory::connectedAtDataBase();
$signedCommentManager = new SignedCommentManager($db);

$commentSigned = $signedCommentManager->resortCommentsSigned();
require('frontend/adminComments.php');