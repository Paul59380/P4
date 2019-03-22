<?php

require('frontend/connectionForm.php');
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

if(isset($_POST['pseudo']) && isset($_POST['password']) && isset($_POST['send']))
{
    $identify = new Controller();
    $identify->createAccount();
}

