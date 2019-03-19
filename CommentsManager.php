<?php
/**
 * Created by PhpStorm.
 * User: paulg
 * Date: 15/03/2019
 * Time: 14:22
 */

class CommentsManager
{
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    /**
     * @param PDO $db
     */
    public function setDb($db)
    {
        $this->db = $db;
    }

    public function addComment($pseudo, $content)
    {

    }

    public function getComment($infoComment)
    {
        $q = $this->db->query('SELECT * FROM comments WHERE id = '.$infoComment);
        while($data = $q ->fetch(PDO::FETCH_ASSOC))
        {
            $comment = new Comment($data);
        }
        return $comment;
    }

    public function getCommentsList()
    {
        $comments = [];

        $q = $this->db->query('SELECT * FROM comments');
        while($data = $q ->fetch(PDO::FETCH_ASSOC))
        {
            $comments[] = new Comment($data);
        }
        return $comments;
    }

    public function getUserComments($infosUser)
    {

    }

    public function update($infoComment)
    {

    }

    public function getCommentsNews($infosNews)
    {
        $comments = [];
        $q = $this->db->query('SELECT * FROM comments WHERE id_news =' . $infosNews);
        while($data = $q ->fetch(PDO::FETCH_ASSOC)){
           $comments[] = new Comment($data);
        }
        return $comments;
    }
}