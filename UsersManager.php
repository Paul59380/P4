<?php
/**
 * Created by PhpStorm.
 * User: paulg
 * Date: 15/03/2019
 * Time: 10:39
 */

class UsersManager
{
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    /**
     * @param PDO $db
     */
    public function setDb($db)
    {
        $this->db = $db;
    }

    public function getAccount($infosAccount)
    {

    }

    public function addAccount($infoAccount, $password)
    {

    }

    public function deleteAccount($infoAccount, $password)
    {

    }

    public function existAccount($infoAccount, $password)
    {

    }
}