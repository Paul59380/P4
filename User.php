<?php
/**
 * Created by PhpStorm.
 * User: paulg
 * Date: 15/03/2019
 * Time: 10:32
 */

class User
{
    protected $id;
    protected $id_profil;
    protected $pseudo;
    protected $password;

    public function __construct($data)
    {
        $this->hydrate($data);
    }

    public function hydrate(array $data)
    {
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);
            $this->$method($value);
        }
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

    public function setId_profil($idProfil)
    {
        $this->id_profil = $idProfil;
    }

    public function getIdProfil()
    {
        return $this->id_profil;
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