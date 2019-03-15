<?php
/**
 * Created by PhpStorm.
 * User: paulg
 * Date: 15/03/2019
 * Time: 10:32
 */

class Users
{
    protected $id;
    protected $idProfile;
    protected $pseudo;
    protected $password;

    public function __construct($data)
    {

    }

    public function hydrate(array $data)
    {

    }

    public function readNews($news)
    {

    }

    public function commentNews()
    {

    }

    public function checkName()
    {

    }

    public function setIdProfile($idProfil)
    {
        $this->idProfil = $idProfil;
    }

    public function getIdProfile()
    {
        return $this->idProfile;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
    }

    public function getPseudo()
    {
        return $this->pseudo;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getPassword()
    {
        return $this->password;
    }
}