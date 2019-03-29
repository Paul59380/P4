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
    protected $news;


    public function __construct()
    {
        $this->db = PDOFactory::connectedAtDataBase();
        $this->news = [];
    }


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

        $q = $this->db->query('SELECT 
       id, id_author, title_news, contains_news, DATE_FORMAT(date_create, \'%d/%m/%Y  à  %Hh%imn%ss\') AS
         date_fr FROM news WHERE id = ' . $infoNews);
        while ($data = $q->fetch(PDO::FETCH_ASSOC)) {
            $news = new News($data);
        }

        $this->news[$infoNews] = $news;
        return $news;
    }

    public function getListNews()
    {
        $news = [];
        $q = $this->db->query('SELECT
       id, id_author, title_news, contains_news, DATE_FORMAT(date_create, \'%d/%m/%Y  à  %Hh%imn%ss\') AS
         date_fr FROM news ORDER BY date_fr DESC ');

        while ($data = $q->fetch(PDO::FETCH_ASSOC)) {
            $news[] = new News($data);
        }
        return $news;
    }

    public function addNews($idAuthor, $titleNews, $containsNews)
    {
        $q = $this->db->prepare('INSERT INTO news(id_author, title_news, contains_news)
        VALUE (:id_author,:title_news,:contains_news)');
        $q->execute(array(
            ":id_author" => $idAuthor,
            ":title_news" => $titleNews,
            ":contains_news" => $containsNews
        ));
    }

    public function updateNews($id, $titleNews, $containsNews)
    {
        $q = $this->db->prepare('UPDATE news SET 
                title_news = :titleNews, contains_news = :containsNews WHERE id ='.$id);
        $q->execute(array(
            ":titleNews" => $titleNews,
            ":containsNews" => $containsNews
        ));
    }

    public function deleteNews($idNews)
    {
        $q = $this->db->prepare('DELETE FROM news WHERE id = :id');
        $q->execute(array(
            ":id" => $idNews
        ));
    }
}