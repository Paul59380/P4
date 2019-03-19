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

    public function __construct(PDO $db)
    {
        $this->db = $db;
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
        $q = $this->db->prepare('INSERT INTO users (pseudo, password, id_profil) VALUE (:infosAccount, :password_account, :id_profil)');
        $q->execute(array(
            ":infosAccount" => $infoAccount,
            ":password_account" => $password,
            ":id_profil" => 3
        ));
    }

    public function deleteAccount($infoAccount, $pass) // Check if the account exist and delete it
    {
        $q = $this->db->prepare('SELECT * FROM  users WHERE pseudo = :test ');
        $q->execute([':test' => $infoAccount]);
        $data = $q->fetch();

        if($infoAccount == $data['pseudo']  && password_verify($pass, $data['password'])){

            $delete = $this->db->prepare('DELETE FROM users WHERE pseudo = :pseudo');
            $delete->execute([':pseudo' => $infoAccount]);

            echo "Le compte à été supprimer";
        }
        else{
            echo "Erreur fatale lors de la suppression";
        }
    }

    public function checkAccount($infoAccount, $pass) // Check if the account exist and return it
    {
           $q = $this->db->prepare('SELECT * FROM  users WHERE pseudo = :test ');
           $q->execute([':test' => $infoAccount]);
           $data = $q->fetch();
           if($infoAccount == $data['pseudo']  && password_verify($pass, $data['password'])){
               echo "Vous êtes connecté !";
               return $data;
           }
           else{
               return "Erreur fatale";
           }
    }
}




















