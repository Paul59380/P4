<?php

session_start();
require('../vendor/autoload.php');
use controller\NewsController;

$getListNews = NewsController::getInstance();
$getListNews->getListAdmin();

