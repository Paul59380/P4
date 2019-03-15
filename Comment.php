<?php
/**
 * Created by PhpStorm.
 * User: paulg
 * Date: 15/03/2019
 * Time: 14:12
 */

class Comment
{
    protected $id;
    protected $idUser;
    protected $idNews;
    protected $comment;
    protected $dateCreate;

    public function __construct($data)
    {

    }

    public function hydrate(array $data)
    {

    }

    public function showComments()
    {

    }

    public function showComment($infoComment)
    {

    }

    public function showUserComment($infoComment, $infoUser)
    {

    }

    public function writeComment()
    {

    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $idUser
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }

    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * @param mixed $idNews
     */
    public function setIdNews($idNews)
    {
        $this->idNews = $idNews;
    }

    public function getIdNews()
    {
        return $this->idNews;
    }

    /**
     * @param mixed $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param mixed $dateCreate
     */
    public function setDateCreate($dateCreate)
    {
        $this->dateCreate = $dateCreate;
    }

    public function getDateCreate()
    {
        return $this->dateCreate;
    }
}