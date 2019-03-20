<?php

function autoload($className)
{
    if(file_exists($path = '../'.$className.'.php')){
        require $path;
    }
}

spl_autoload_register('autoload');


$db = PDOFactory::connectedAtDataBase();
$manager = new NewsManager($db);
$news = $manager->getListNews();

require('displayHome.php');


