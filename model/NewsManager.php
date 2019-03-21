<?php
/**
 * Created by PhpStorm.
 * User: paulg
 * Date: 15/03/2019
 * Time: 14:55
 */

class NewsManager
{
    protected $db;
    private $news;

    /**
     * @param mixed $db
     */
    public function __construct(PDO $db)
    {
        $this->db = $db;
        $this->news = [];
    }

    /**
     * @return mixed|PDO
     */
    public function getDb()
    {
        return $this->db;
    }

    public function setDb(PDO $db)
    {
        $this->db = $db;
    }

    public function getNews($infoNews)
    {
        if (isset($this->news[$infoNews])) {
            return $this->news[$infoNews];
        }

        $q = $this->db->query('SELECT * FROM news WHERE id = ' . $infoNews);
        while ($data = $q->fetch(PDO::FETCH_ASSOC)) {
            $news = new News($data);
        }

        $this->news[$infoNews] = $news;
        return $news;
    }

    public function getListNews()
    {
        $news = [];
        $q = $this->db->query('SELECT * FROM news');

        while ($data = $q->fetch(PDO::FETCH_ASSOC)) {
            $news[] = new News($data);
        }
        return $news;
    }
}