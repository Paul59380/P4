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
        $db = new \PDO('mysql:host=localhost;dbname=blog_p4;charset=utf8', 'root', '');
        $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        return $db;
    }
}
//http://projet-4.paul-projets-opc.com
//mysql:host=db5000039623.hosting-data.io;dbname=dbs34584;charset=utf8', 'dbu83477', 'Rodius007'
