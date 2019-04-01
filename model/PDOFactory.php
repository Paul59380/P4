<?php
/**
 * Created by PhpStorm.
 * User: paulg
 * Date: 15/03/2019
 * Time: 10:43
 */
namespace model;

class PDOFactory  //Pattern Factory // Test
{
    public static function connectedAtDataBase()
    {
        $db = new \PDO('mysql:host=localhost;dbname=blog_P4;charset=utf8', 'root', '');
        $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        return $db;
    }
}