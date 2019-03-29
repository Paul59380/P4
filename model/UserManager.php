<?php
/**
 * Created by PhpStorm.
 * User: paulg
 * Date: 15/03/2019
 * Time: 10:39
 */

class UserManager
{
    protected $db;
    private $user;

    public function __construct()
    {
        $this->db = PDOFactory::connectedAtDataBase();
        $this->user = [];
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

        $q = $this->db->query('SELECT * FROM users WHERE id = ' . $userId);

        while ($data = $q->fetch(PDO::FETCH_ASSOC)) {
            $user = new User($data);
        }
        $this->user[$userId] = $user;
        return $user;
    }

    public function addUserAccount($infoAccount, $password)
    {
        $q = $this->db->prepare('INSERT INTO users (pseudo, password, id_profil) VALUE (:infosAccount, :password_account, :id_profil)');
        $q->execute(array(
            ":infosAccount" => $infoAccount,
            ":password_account" => $password,
            ":id_profil" => 2
        ));
    }

    public function addVisitorAccount($infoAccount, $password)
    {
        if(!$this->exists($infoAccount)){
            $q = $this->db->prepare('INSERT INTO users (pseudo, password, id_profil) VALUE (:infosAccount, :password_account, :id_profil)');
            $q->execute(array(
                ":infosAccount" => $infoAccount,
                ":password_account" => $password,
                ":id_profil" => 3
            ));
        }
        else {
            throw new Exception("Ce personnage existe déjà !");

        }

    }

    /**
     * @param $infoAccount
     * @param $pass
     * @throws Exception
     */
    public function deleteAccount($infoAccount, $pass) // Check if the account exist and delete it
    {
        $q = $this->db->prepare('SELECT * FROM  users WHERE pseudo = :test ');
        $q->execute([':test' => $infoAccount]);
        $data = $q->fetch();

        if ($infoAccount == $data['pseudo'] && password_verify($pass, $data['password'])) {

            $delete = $this->db->prepare('DELETE FROM users WHERE pseudo = :pseudo');
            $delete->execute([':pseudo' => $infoAccount]);

            throw new Exception("Le compte à été supprimer");
        } else {
            throw new Exception("Erreur fatale lors de la suppression");
        }
    }

    /**
     * @param $infoAccount
     * @param $pass
     * @return mixed
     * @throws Exception
     */
    public function checkAccountUser($infoAccount, $pass) // Check if the account exist and return it
    {
        $q = $this->db->prepare('SELECT * FROM  users WHERE pseudo = :test ');
        $q->execute([':test' => $infoAccount]);
        $data = $q->fetch();
        if ($infoAccount == $data['pseudo'] && password_verify($pass, $data['password'])) {
            echo "<p>Vous êtes connecté !</p>";
            return $data;
        } else {
            throw new Exception('Mots de pass incorrect');
        }
    }

    /**
     * @param $infoAccount
     * @return mixed
     * @throws Exception
     */
    public function checkAccountVisitor($infoAccount) // Check if the account exist and return it
    {
        $q = $this->db->prepare('SELECT * FROM  users WHERE pseudo = :test ');
        $q->execute([':test' => $infoAccount]);
        $data = $q->fetch();
        if ($infoAccount == $data['pseudo'] && $data['id_profil'] == 3) {
            echo "<p>Vous êtes connecté !</p>";
            return $data;
        } else{
           throw new Exception('Un mots de passe doit être renseigné pour un compte utilisateur');
        }
    }

    public function exists($info)
    {
        if (is_int($info)) {
            return (bool)$this->db->query('SELECT * FROM users WHERE id=' . $info)->fetchColumn();
        } else {
            $q = $this->db->prepare('SELECT * FROM users WHERE pseudo = :pseudo');
            $q->execute([':pseudo' => $info]);
            return $q->fetchColumn();
        }
    }
}




















