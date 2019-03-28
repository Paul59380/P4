<?php
/**
 * Created by PhpStorm.
 * User: paulg
 * Date: 28/03/2019
 * Time: 11:45
 */

class UserController
{
    protected $db;
    protected $userManager;

    public function __construct()
    {
        $this->db = PDOFactory::connectedAtDataBase();
        $this->userManager = new UserManager($this->db);
    }

    public function createAccount()
    {
        if (isset($_POST['pseudo']) && isset($_POST['password']) && isset($_POST['send'])) {

            if (!empty($_POST['pseudo']) && !empty($_POST['password'])) {
                $this->userManager->addUserAccount($_POST['pseudo'], password_hash($_POST['password'], PASSWORD_DEFAULT));
            } elseif (!empty($_POST['pseudo']) && empty($_POST['password']) && isset($_POST['send'])) {

                $this->userManager->addVisitorAccount($_POST['pseudo'], $_POST['password']);
            } else {
                header('Location:index.php');
            }
        }
    }
}