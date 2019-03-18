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
        $q = $this->db->query('SELECT * FROM users WHERE id = ' .$infosAccount);

        while($data = $q->fetch(PDO::FETCH_ASSOC))
        {
            $account = new Users($data);
        }
        return $account;
    }

    public function addUserAccount($infoAccount, $password)
    {
        $q = $this->db->prepare('INSERT INTO users (pseudo, password, id_profil) VALUE (:infosAccount, :password_account, :id_profil)');
        $q->execute(array(
            ":infosAccount" => $infoAccount,
            ":password_account" =>$password,
            ":id_profil" => 2
        ));
    }

    public function addVisitorAccount($infoAccount, $password)
    {
        $q = $this->db->prepare('INSERT INTO users (pseudo, password, id_profil) VALUE (:infosAccount, :password_account, :id_profil)');
        $q->execute(array(
            ":infosAccount" => $infoAccount,
            ":password_account" =>$password,
            ":id_profil" => 3
        ));
    }

    public function deleteAccount($infoAccount, $password)
    {

    }

    public function existAccount($infoAccount, $password)
    {

    }
}