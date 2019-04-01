<?php
/**
 * Created by PhpStorm.
 * User: paulg
 * Date: 15/03/2019
 * Time: 14:51
 */
namespace model;

class News
{
    protected $id;
    protected $id_author;
    protected $title_news;
    protected $contains_news;
    protected $date_create;

    public function __construct($data)
    {
        $this->hydrate($data);
    }

    public function hydrate($data)
    {
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);
            $this->$method($value);
        }
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id_author
     */
    public function setId_author($id_author)
    {
        $this->id_author = $id_author;
    }

    public function getIdAuthor()
    {
        return $this->id_author;
    }

    /**
     * @param mixed $title_news
     */
    public function setTitle_news($title_news)
    {
        $this->title_news = $title_news;
    }

    public function getTitleNews()
    {
        return $this->title_news;
    }

    /**
     * @param mixed $contains_news
     */
    public function setContains_news($contains_news)
    {
        $this->contains_news = $contains_news;
    }

    public function getContainsNews()
    {
        return $this->contains_news;
    }

    /**
     * @param mixed $date_create
     */
    public function setDate_fr($date_create)
    {
        $this->date_create = $date_create;
    }

    public function getDateCreate()
    {
        return $this->date_create;
    }
}