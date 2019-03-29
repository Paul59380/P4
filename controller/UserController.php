<?php
/**
 * Created by PhpStorm.
 * User: paulg
 * Date: 28/03/2019
 * Time: 11:45
 */


class UserController
{
    public $userManager;
    protected static $instance;

    protected function __construct()
    {
        $this->userManager = new UserManager();
    }

    protected function __clone()
    {
        // TODO: Implement __clone() method.
    }

    public static function getInstance()
    {
        if(!isset(self::$instance)){
            self::$instance = new self;
        }

        return self::$instance;
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

    public function userAccount(UserManager $userManager)
    {
        $data = $userManager->checkAccountUser($_POST['pseudo'], $_POST['password']);
        $user = $userManager->getUser($data['id']);
        $_SESSION['name'] = $user->getPseudo();
        $_SESSION['id'] = $user->getId();
        header('Location:index.php');
    }

    public function visitorAccount(UserManager $userManager)
    {
        $data = $userManager->checkAccountVisitor($_POST['pseudo']);
        $user = $userManager->getUser($data['id']);
        $_SESSION['name'] = $user->getPseudo();
        $_SESSION['id'] = $user->getId();
        header('Location:index.php');
    }
}