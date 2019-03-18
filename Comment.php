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
    protected $id_user;
    protected $id_news;
    protected $contains_comment;
    protected $date_create;

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

    public function showComments($infoComment)
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

    public function updateComment()
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
     * @param mixed $id_user
     */
    public function setId_user($id_user)
    {
        $this->id_user = $id_user;
    }

    public function getIdUser()
    {
        return $this->id_user;
    }

    /**
     * @param mixed $id_news
     */
    public function setId_news($id_news)
    {
        $this->id_news = $id_news;
    }

    public function getIdNews()
    {
        return $this->id_news;
    }

    /**
     * @param mixed $comment
     */
    public function setContains_comment($comment)
    {
        $this->contains_comment = $comment;
    }

    public function getContainsComment()
    {
        return $this->contains_comment;
    }

    /**
     * @param mixed $date_create
     */
    public function setDate_create($date_create)
    {
        $this->date_create = $date_create;
    }

    public function getDateCreate()
    {
        return $this->date_create;
    }
}