<?php
session_start();

function autoload($className)
{
    if (file_exists($path = '../model/'. $className . '.php')) {
        require $path;
    }
    elseif (file_exists($pathTwo = "../controller/" .$className . '.php')) {
        require $pathTwo;
    }
}

spl_autoload_register('autoload');
$getListNews = new NewsController();
$getListNews->getList();




