<?php
/**
 * Created by PhpStorm.
 * User: paulg
 * Date: 15/03/2019
 * Time: 10:32
 */

namespace model;

class User
{
    protected $id;
    protected $id_role;
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

    public function getIdRole()
    {
        return $this->id_role;
    }

    public function setId_role($idRole)
    {
        $this->id_role = $idRole;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getPseudo()
    {
        return $this->pseudo;
    }

    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }
}
