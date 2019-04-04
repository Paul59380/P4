<?php
/**
 * Created by PhpStorm.
 * User: paulg
 * Date: 15/03/2019
 * Time: 10:39
 */

namespace model;

class UserManager
{
    protected static $instance;
    protected $db;
    private $user;

    protected function __construct()
    {
        $this->db = PDOFactory::connectedAtDataBase();
        $this->user = [];
    }

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    /**
     * @param PDO $db
     */
    public function setDb($db)
    {
        $this->db = $db;
    }

    public function getUser($userId)
    {
        if (isset($this->user[$userId])) {
            return $this->user[$userId];
        }
        $q = $this->db->query('SELECT * FROM user WHERE id = ' . $userId);
        while ($data = $q->fetch(\PDO::FETCH_ASSOC)) {
            $user = new User($data);
        }
        $this->user[$userId] = $user;

        return $user;
    }

    public function addUserAccount($infoAccount, $password)
    {
        $q = $this->db->prepare('INSERT INTO user (pseudo, password, id_role) VALUE (:infosAccount, :password_account, :id_role)');
        $q->execute(array(
            ":infosAccount" => $infoAccount,
            ":password_account" => $password,
            ":id_role" => 2
        ));
    }

    public function addVisitorAccount($infoAccount, $password)
    {
        if (!$this->exists($infoAccount)) {
            $q = $this->db->prepare('INSERT INTO user (pseudo, password, id_role) VALUE (:infosAccount, :password_account, :id_role)');
            $q->execute(array(
                ":infosAccount" => $infoAccount,
                ":password_account" => $password,
                ":id_role" => 3
            ));
        } else {
            throw new \Exception("Ce compte existe déjà !");
        }
    }

    public function exists($info)
    {
        if (is_int($info)) {
            return (bool)$this->db->query('SELECT * FROM user WHERE id=' . $info)->fetchColumn();
        } else {
            $q = $this->db->prepare('SELECT * FROM user WHERE pseudo = :pseudo');
            $q->execute([':pseudo' => $info]);

            return $q->fetchColumn();
        }
    }

    public function deleteAccount($infoAccount, $pass) // Check if the account exist and delete it
    {
        $q = $this->db->prepare('SELECT * FROM  user WHERE pseudo = :test ');
        $q->execute([':test' => $infoAccount]);
        $data = $q->fetch();

        if ($infoAccount == $data['pseudo'] && password_verify($pass, $data['password'])) {
            $delete = $this->db->prepare('DELETE FROM user WHERE pseudo = :pseudo');
            $delete->execute([':pseudo' => $infoAccount]);
            throw new \Exception("Le compte à été supprimer");
        } else {
            throw new \Exception("Erreur fatale lors de la suppression");
        }
    }

    public function checkAccountUser($infoAccount, $pass) // Check if the account exist and return it
    {
        $q = $this->db->prepare('SELECT * FROM  user WHERE pseudo = :test ');
        $q->execute([':test' => $infoAccount]);
        $data = $q->fetch();
        if ($infoAccount == $data['pseudo'] && password_verify($pass, $data['password'])) {
            return $data;
        } else {
            throw new \Exception('Mot de passe incorrect');
        }
    }

    public function checkAccountVisitor($infoAccount) // Check if the account exist and return it
    {
        $q = $this->db->prepare('SELECT * FROM  user WHERE pseudo = :test ');
        $q->execute([':test' => $infoAccount]);
        $data = $q->fetch();
        if ($infoAccount == $data['pseudo'] && $data['id_role'] == 3) {
            return $data;
        } else {
            throw new \Exception('Un mot de passe doit être renseigné pour un compte utilisateur');
        }
    }

    protected function __clone()
    {
    }
}
