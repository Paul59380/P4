<?php
/**
 * Created by PhpStorm.
 * User: paulg
 * Date: 28/03/2019
 * Time: 11:09
 */

namespace controller;

use model\NewsManager;

class NewsController
{
    protected static $instance;
    protected $newsManager;

    protected function __construct()
    {
        $this->newsManager = NewsManager::getInstance();
    }

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    public function getList()
    {
        $news = $this->newsManager->getListNews();

        require('../view/frontend/displayHome.php');

        return $news;
    }

    public function getListAdmin()
    {
        $news = $this->newsManager->getListNews();

        require('../view/frontend/adminBackNews.php');

        return $news;
    }

    public function addNews($idAuthor, $titleNews, $containsNews)
    {
        $addNews = $this->newsManager->addNews($idAuthor, $titleNews, $containsNews);

        return $addNews;
    }

    public function getNews($idNews)
    {
        $this->newsManager->getNews($idNews);

        return $this->newsManager;
    }

    public function updateNews($id, $titleNews, $containsNews)
    {
        $this->newsManager->updateNews($id, $titleNews, $containsNews);

        return $this->newsManager;
    }

    public function deleteNews($idNews)
    {
        $deleteNews = $this->newsManager->deleteNews($idNews);

        return $deleteNews;
    }

    protected function __clone()
    {
    }
}
