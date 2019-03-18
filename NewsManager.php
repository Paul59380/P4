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

    /**
     * @param mixed $db
     */
    public function __construct(PDO $db)
    {
        $this->db = $db;
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
        $q = $this->db->query('SELECT * FROM news WHERE id = '. $infoNews);
        while($data = $q ->fetch(PDO::FETCH_ASSOC))
        {
            $news = new News($data);
        }
            return $news;
    }

    public function getListNews()
    {
        $news = [];
        $q = $this->db->query('SELECT * FROM news');

        while($data = $q ->fetch(PDO::FETCH_ASSOC))
        {
            $news[] = new News($data);
        }
        return $news;
    }

    public function getCommentsNews($infosNews, $infosComment)
    {

    }
}